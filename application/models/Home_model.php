<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *

 */
class Home_model extends CI_Model
{
    var $table = "home";
    var $order_column = array('TYPEAREA', 'vhid', 'age_y');
    var $hospcode ;

    function __construct()
    {
        //$this->db2 = $this->load->database('vaccine', TRUE);
        $this->hospcode = $this->session->userdata('hospcode');
    }
    function make_query()
    {
        $ASM = $this->session->userdata('cid');
        $hospcode = $this->session->userdata('hospcode');
        $this->db
            ->where('HOSPCODE',$hospcode)
            ->where('ASM', $ASM)
            ->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("HOUSE", $_POST["search"]["value"]);
            $this->db->group_end();
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('', '');
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
  
    public function get_person($cid)
    {
        $rs = $this->db
            ->where('CID', $cid)
            ->get("t_person_cid_hash")
            ->row();
        return $rs;
    }

    public function set_status_cancle($hid)
    {
        $rs = $this->db
            ->set('asm', 'NULL', FALSE)
            ->where('HID', $hid)
            ->where('HOSPCODE', $this->hospcode)
            ->update('home');

        return $rs;
    }


    public function search_home($house_id)
    {
        $rs = $this->db
            ->where("HOUSE", $house_id)
            ->where("hospcode", $this->hospcode)
            ->get("home")
            ->row_array();
        return $rs;
    }

    public function set_invite($cid)
    {
        $invite = $this->session->userdata('cid');
        $rs = $this->db
            ->set('invite_runner', $invite)
            ->where("CID", $cid)
            ->update("t_person_cid_hash");
        return $rs;
    }
}
