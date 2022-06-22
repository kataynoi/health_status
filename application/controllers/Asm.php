<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asm extends CI_Controller
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("asm_login"))
            redirect(site_url("user/login"));
        $this->load->model('Asm_model', 'crud');
    }

    public function index()
    {
        $data[] = '';
        $this->layout->view('asm/index', $data);
    }
    public function search_person()
    {
        $data[] = '';
        $cid = $this->input->post('cid');
        if (!empty($cid)) {
            $data['person'] = $this->crud->search_person($cid);
            $data['person']['vhid'] = $data['person']['addr'] . " " . get_short_address($data['person']['vhid']);
        }
        $this->layout->view('asm/search_person', $data);
    }
    public function invite($cid)
    {
        $data['asm'] = $this->crud->get_person($cid);
        $this->layout->view('asm/invite', $data);
    }
    public function set_asm()
    {

        $cid = $this->input->post('cid');
        $rs = $this->crud->set_asm($cid);
        if ($rs) {
            redirect(site_url('asm'), 'refresh');
        }
    }

    function fetch_asm()
    {
        $fetch_data = $this->crud->make_datatables();
        $data = array();


        foreach ($fetch_data as $row) {


            $bib = "<div class='btn-group' role='group' >";
            $bib .= "<button class='btn btn-danger' data-btn='btn_del_asm' data-cid='" . $row->CID . "'><i class='fa fa-trash'></i></button>";
            // $bib .= "<a class='btn btn-warning' data-btn='btn_needle3_edit' href=" . site_url('asm/invite/') . $row->CID . " ><i class='fa fa-edit' ></i></a>";
            
            
            $sub_array = array();
            $sub_array[] = $bib;
            $sub_array[] = $row->CID;
            $sub_array[] = $row->NAME;
            $sub_array[] = $row->LNAME;
            
            $sub_array[] = to_thai_date($row->BIRTH);
            $sub_array[] = $row->addr . " " . get_address($row->vhid);
            $sub_array[] = $row->age_y;


            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud->get_all_data(),
            "recordsFiltered" => $this->crud->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function del_invote()
    {
        $id = $this->input->post('id');

        $rs = $this->crud->del_invite($id);
        if ($rs) {
            $json = '{"success": true}';
        } else {
            $json = '{"success": false}';
        }

        render_json($json);
    }
    public function set_vaccine_status()
    {
        $cid = $this->input->post('cid');

        $rs = $this->crud->set_vaccine_status($cid);
        if ($rs) {
            $json = '{"success": true}';
        } else {
            $json = '{"success": false}';
        }

        render_json($json);
    }

    public function set_asm_cancle()
    {
        $cid = $this->input->post('cid');

        $rs = $this->crud->set_asm_cancle($cid);
        if ($rs) {
            $json = '{"success": true}';
        } else {
            $json = '{"success": false}';
        }

        render_json($json);
    }


    public function set_need_vaccine3()
    {
        $cid = $this->input->post('cid');

        $rs = $this->crud->set_need_vaccine3($cid);
        if ($rs) {
            $json = '{"success": true}';
        } else {
            $json = '{"success": false}';
        }

        render_json($json);
    }
    // set_need_vaccine3
    public function  save_asm()
    {
        $data = $this->input->post('items');
        $rs = $this->crud->save_asm($data);
        if ($rs) {
            $json = '{"success": true,"id":' . $rs . '}';
        } else {
            $json = '{"success": false}';
        }
        render_json($json);
    }

    public function  get_person_vaccine()
    {
        $id = $this->input->post('id');
        $rs = $this->crud->get_person_vaccine($id);
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": ' . $rows . '}';
        render_json($json);
    }
}
