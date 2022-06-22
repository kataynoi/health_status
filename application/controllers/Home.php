<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("asm_login"))
            redirect(site_url("user/login"));
        $this->load->model('home_model', 'crud');
    }

    public function index()
    {
        $data[] = '';
        //$data["cvaccine_status"] = $this->crud->get_cvaccine_status();
        $this->layout->view('home/index', $data);
    }
    public function search_home()
    {
        $data[] = '';
        $HOUSE = $this->input->post('HOUSE');
        if (!empty($HOUSE)) {
            $data['house'] = $this->crud->search_home($HOUSE);
            //$data['person']['vhid'] = $data['person']['addr'] . " " . get_short_address($data['person']['vhid']);
        }
        $this->layout->view('home/search_home', $data);
    }
    public function invite($cid)
    {
        $data['home'] = $this->crud->get_person($cid);
        $this->layout->view('home/invite', $data);
    }
    public function set_invite()
    {

        $cid = $this->input->post('cid');
        $rs = $this->crud->set_invite($cid);
        if ($rs) {
            redirect(site_url('home'), 'refresh');
        }
    }

    function fetch_home()
    {
        $fetch_data = $this->crud->make_datatables();
        $data = array();


        foreach ($fetch_data as $row) {


            $HOUSE = "<div class='btn-group' role='group' >";
            $HOUSE .= "<button class='btn btn-danger' data-btn='btn_del' data-hid='" . $row->HID . "'><i class='fa fa-trash'></i></button>";
            $HOUSE .= "<a class='btn btn-warning' data-btn='btn_needle3_edit' href=" . site_url('home/invite/') . $row->HID . " ><i class='fa fa-edit' ></i></a>";
            
            $sub_array = array();
            $sub_array[] = $HOUSE;
            $sub_array[] = $row->HID;
            $sub_array[] = $row->HOUSE;
            $sub_array[] = get_owner_home($row->HID);


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

    function fetch_person_vaccine_set()
    {
        $fetch_data = $this->crud->make_datatables();
        $data = array();


        foreach ($fetch_data as $row) {
            if ($row->needle_3 != '') {
                if ($row->vaccine_plan3_date != '') {
                    $needle3 = to_thai_date($row->vaccine_plan3_date) . "-" . $row->vaccine_name3;
                    $sub_array[] = $row->HOSPCODE;
                } else {
                    $needle3 = to_thai_date($row->needle_3);
                }
            } else {
                $needle3 = "<button class='btn btn-success' data-btn='btn_needle3' data-cid='" . $row->CID . "'>กำหนดเป้าหมาย</button>";
            }

            $day_needle2 = get_current_age($row->vaccine_plan2_date);
            $sub_array = array();
            $sub_array[] = $needle3;
            $sub_array[] = $row->CID;
            $sub_array[] = $row->NAME;
            $sub_array[] = $row->LNAME;
            $sub_array[] = $row->SEX;
            $sub_array[] = to_thai_date($row->BIRTH);
            $sub_array[] = $row->TYPEAREA;
            $sub_array[] = $row->addr . " " . get_address($row->vhid);
            $sub_array[] = $row->age_y;
            $sub_array[] = to_thai_date($row->vaccine_plan2_date);
            $sub_array[] = $row->vaccine_hosp2;
            $sub_array[] = $row->vaccine_name1 . "/" . $row->vaccine_name2;
            $sub_array[] = $row->vaccine_provname;
            $sub_array[] = $day_needle2['month'] . " เดือน " . $day_needle2['day'] . " วัน";
            $sub_array[] = to_thai_date($row->vaccine_plan3_date) . "-" . $row->vaccine_name3;

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

    public function set_status_cancle()
    {
        $hid = $this->input->post('hid');

        $rs = $this->crud->set_status_cancle($hid);
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
    public function  save_home()
    {
        $data = $this->input->post('items');
        $rs = $this->crud->save_home($data);
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
