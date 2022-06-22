<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *

 */
class Asm_model extends CI_Model
{
    var $table = "t_person_cid_hash";
    var $order_column = array('TYPEAREA', 'vhid', 'age_y');

    function __construct()
    {
        //$this->db2 = $this->load->database('vaccine', TRUE);
    }
    function make_query()
    {

        $hospcode = $this->session->userdata('hospcode');
        $this->db
            ->where('HOSPCODE', $hospcode)
            ->where('aorsormor', '1')
            ->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("CID", $_POST["search"]["value"]);
            $this->db->or_like("NAME", $_POST["search"]["value"]);
            $this->db->or_like("LNAME", $_POST["search"]["value"]);
            $this->db->group_end();
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('vhid', 'ASC');
        }
    }

    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    /* End Datatable*/
    public function del_invite($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->delete('t_person_cid_hash');
        return $rs;
    }

    public function get_cvaccine_status()
    {
        $rs = $this->db
            ->get("cvaccine_status")
            ->result_array();
        return $rs;
    }

    public function get_vaccine_status_name($id)
    {
        $rs = $this->db
            ->where("id", $id)
            ->get("cstatus_vaccine")
            ->row();
        return $rs ? $rs->name : "";
    }

    public function save_asm($data)
    {
        if ($data["bib"] == "") {
            $data["bib"] = "NULL";
        }
        $rs = $this->db
            ->set("mobile", $data["mobile"])
            ->set("weight", $data["weight"])
            ->set("height", $data["height"])
            ->set("asm_type", $data["asm_type"])
            ->set("invite_asm", $data["invite"])
            ->set("bib", $data["bib"])
            ->where('CID', $data["cid"])
            ->update('t_person_cid_hash');

        return $rs;
    }

    public function get_person($cid)
    {
        $rs = $this->db
            ->where('CID', $cid)
            ->get("t_person_cid_hash")
            ->row();
        return $rs;
    }
    public function set_vaccine_status($cid)
    {
        $rs = $this->db
            ->set('needle_3', date('Y-m-d'))
            ->where('CID', $cid)
            ->update('t_person_cid_hash');

        return $rs;
    }
    public function set_asm_cancle($cid)
    {
        $rs = $this->db
            ->set('aorsormor', 'NULL', FALSE)
            ->where('CID', $cid)
            ->update('t_person_cid_hash');
        return $rs;
    }
    public function set_asm($cid)
    {
        $rs = $this->db
            ->set('aorsormor', '1')
            ->where('CID', $cid)
            ->update('t_person_cid_hash');
        return $rs;
    }

    public function set_need_vaccine3($cid)
    {
        $rs = $this->db
            ->set('target_needle3_14', '1')
            ->where('CID', $cid)
            ->update('t_person_cid_hash');

        return $rs;
    }
    public function search_person($cid)
    {
        $rs = $this->db
            ->where("cid", $cid)
            ->get("t_person_cid_hash")
            ->row_array();
        return $rs;
    }

    public function set_invite($cid)
    {
        $invite = $this->session->userdata('cid');
        $rs = $this->db
            ->set('invite_asm', $invite)
            ->where("CID", $cid)
            ->update("t_person_cid_hash");
        return $rs;
    }
}
