<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @author  Mr.Dechachit Kaewmaung <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 */
class Report extends CI_Controller
{
    public $user_id;
    public $id;


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Basic_model', 'basic');
        $this->load->model('Reports_model', 'crud');
        $this->id = $this->session->userdata('id');
    }

    public function index()
    {
        $data['report_items'] = $this->crud->get_report_items();
        $this->layout->view('reports/index', $data);
    }
    public function disease()
    {
        $data['report_items'] = $this->crud->get_report_items();
        $this->layout->view('reports/disease', $data);
    }
    public function  death_disease($id = 1)
    {
        $ampur = $this->input->post('ampurcode');
        $tambon = $this->input->post('tamboncode');
        $year = $this->input->post('year_ngob');
        if (!isset($year)) {
            $year = $this->config->item('year_ngob');
        }
        $hospcode = $this->session->userdata('hospcode');
        $sql_report = $this->crud->get_sql_report_disease($id);
        $data['report_name'] = $sql_report['name'] . " ปีงบประมาณ " . $year;
        $data['id'] = $id;
        $disease = $sql_report['sql'];

        // echo "tambon".$tambon;
        $data['amp'] = $this->basic->get_ampur_list('44');
        // $this->load->model('log_model');
        //$this->log_model->save_log_view($this->id, 'รายงาน กลุ่มเป้าหมายวัคซีน');
        $this->session->set_userdata('ampur', $ampur);
        $this->session->set_userdata('year_ngob', $year);
        $data['report'] = $this->crud->death_disease($ampur, $disease, $year);


        $this->layout->view('reports/death_disease', $data);
    }
    public function  birth()
    {
        $ampur = $this->input->post('ampurcode');
        $tambon = $this->input->post('tamboncode');
        $year = $this->input->post('year_ngob');
        if (!isset($year)) {
            $year = $this->config->item('year_ngob');
        }
        $hospcode = $this->session->userdata('hospcode');

        $data['amp'] = $this->basic->get_ampur_list('44');
        $this->session->set_userdata('ampur', $ampur);
        $this->session->set_userdata('year_ngob', $year);
        $data['report'] = $this->crud->birth($ampur, $year);


        $this->layout->view('reports/birth', $data);
    }

    public function  hale()
    {
        $url = $this->config->item('web_api') . "/reports/hale";

        $data1 = array("sex" => "1");
        $data2 = array("sex" => "2");
        $data3 = array("sex" => "3");
        $data['hale7'] = (array)json_decode($this->CallAPI($url, $data3));
        $data['hale7_male'] = (array)json_decode($this->CallAPI($url, $data1));
        $data['hale7_female'] = (array)json_decode($this->CallAPI($url, $data2));
        $this->layout->view('reports/hale7', $data);
    }

    public function  yll7()
    {

        $prov_code = $this->input->post('prov_code');
        if ($prov_code == '') {
            $prov_code = $this->config->item('prov_code');
        }
        $this->session->set_userdata('prov_code', $prov_code);
        $url = $this->config->item('web_api') . "/reports/yll";

        $data1 = array("sex" => "1", "prov" => $prov_code);
        $data2 = array("sex" => "2", "prov" => $prov_code);
        $data3 = array("sex" => "3", "prov" => $prov_code);

        $data['yll7'] = (array)json_decode($this->CallAPI($url, $data3));
        $data['yll7_male'] = (array)json_decode($this->CallAPI($url, $data1));
        $data['yll7_female'] = (array)json_decode($this->CallAPI($url, $data2));
        $this->layout->view('reports/yll7', $data);
    }
    public function  group_disease_stat($id = 1)
    {
        $ampur = $this->input->post('ampurcode');
        $tambon = $this->input->post('tamboncode');
        $year = $this->input->post('year_ngob');
        if (!isset($year)) {
            $year = $this->config->item('year_ngob');
        }
        $hospcode = $this->session->userdata('hospcode');
        $sql_report = $this->crud->get_sql_report_disease($id);
        $data['report_name'] = $sql_report['name'] . " ปีงบประมาณ " . $year;
        $data['id'] = $id;
        $disease = $sql_report['sql'];

        // echo "tambon".$tambon;
        $data['amp'] = $this->basic->get_ampur_list('44');
        // $this->load->model('log_model');
        //$this->log_model->save_log_view($this->id, 'รายงาน กลุ่มเป้าหมายวัคซีน');
        $this->session->set_userdata('ampur', $ampur);
        $this->session->set_userdata('year_ngob', $year);
        $data['report'] = $this->crud->death_disease($ampur, $disease, $year);
        $this->layout->view('reports/group_disease_stat', $data);
    }

    public function le()
    {
        $url = $this->config->item('web_api') . "/reports/le";

        $data1 = array("sex" => "1");
        $data2 = array("sex" => "2");
        $data3 = array("sex" => "3");
        $data['le7'] = (array)json_decode($this->CallAPI($url, $data3));
        $data['le7_male'] = (array)json_decode($this->CallAPI($url, $data1));
        $data['le7_female'] = (array)json_decode($this->CallAPI($url, $data2));
        $this->layout->view('reports/le7', $data);
    }
    public function  CallAPI($url, $data)
    {

        $url = sprintf("%s?%s", $url, http_build_query($data));
        $key = "X-API-Key:" . $this->config->item('key_api');
        $user = $this->config->item('user_api');
        $pass = $this->config->item('pass_api');

        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $user . ":" . $pass);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($key, "Content-Type:application/json", 'Accept: application/json'));
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        $result = curl_exec($ch);
        //print_r($result);
        curl_close($ch);
        return $result;
    }
}
