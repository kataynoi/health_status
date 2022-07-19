<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $data['report_items'] = $this->crud->get_report_items() ;
        $this->layout->view('reports/index', $data);
    }
    public function disease()
    {
        $data['report_items'] = $this->crud->get_report_items() ;
        $this->layout->view('reports/disease', $data);
    }
    public function  death_disease($id=1)
    {
        $ampur=$this->input->post('ampurcode');
        $tambon=$this->input->post('tamboncode');
        $year =$this->input->post('year_ngob');
        if(!isset($year)){
            $year=$this->config->item('year_ngob');
        }
        $hospcode = $this->session->userdata('hospcode');
        $sql_report = $this->crud->get_sql_report_disease($id);
        $data['report_name']=$sql_report['name'] ." ปีงบประมาณ ".$year;
        $data['id']=$id;
        $disease =$sql_report['sql'];
        
       // echo "tambon".$tambon;
        $data['amp']=$this->basic->get_ampur_list('44');
       // $this->load->model('log_model');
        //$this->log_model->save_log_view($this->id, 'รายงาน กลุ่มเป้าหมายวัคซีน');
        $this->session->set_userdata('ampur',$ampur);
        $this->session->set_userdata('year_ngob',$year);
        $data['report'] = $this->crud->death_disease($ampur,$disease,$year);
        $this->layout->view('reports/death_disease', $data);
    }



}