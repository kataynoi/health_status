<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
    public $prov_code;
    public function __construct()
    {
        parent::__construct();
    /*  if ($this->session->userdata("user_type") != 1)
            redirect(site_url("user/login"));
            
    */
        $this->load->model('excel_import_model');
        $this->load->library('excel');
        $this->prov_code = $this->config->item('prov_code');
    }

    function index()
    {
        $this->layout->view('excel_import/excel_import');
    }

    function fetch()
    {
        $data = $this->excel_import_model->select();
        $output = '
		<h3 align="center">Total Data - ' . $data->num_rows() . '</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Customer Name</th>
				<th>Address</th>
				<th>City</th>
				<th>Postal Code</th>
				<th>Country</th>
			</tr>
		';
        foreach ($data->result() as $row) {
            $output .= '
			<tr>
				<td>' . $row->CustomerName . '</td>
				<td>' . $row->Address . '</td>
				<td>' . $row->City . '</td>
				<td>' . $row->PostalCode . '</td>
				<td>' . $row->Country . '</td>
			</tr>
			';
        }
        $output .= '</table>';
        echo $output;
    }

    function import_r7()
    {
        if (isset($_FILES["file_death"]["name"])) {
            $path = $_FILES["file_death"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $data=array();
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    
                        $pid = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $sex = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $age = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $ddate = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $dmon = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $dyear = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $drcode = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $hos_id = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $lccaattmm = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $ncause = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $bdate = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $bmon = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $byear = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                        $dplace = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $ghos = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $codepro = $worksheet->getCellByColumnAndRow(15, $row)->getValue();

                        $data[] = array(
                            'DATE_IMPORT' => date("Y-m-d H:i:s"),
                            'PID' => $pid,
                            'SEX' => $sex,
                            'AGE' => $age,
                            'DDATE' => $ddate,
                            'DMON' => $dmon,
                            'DYEAR' => $dyear,
                            'DRCODE' => $drcode,
                            'HOS_ID' => $hos_id,
                            'LCCAATTMM' => $lccaattmm,
                            'NCAUSE' => $ncause,
                            'BDATE' => $bdate,
                            'BMON' => $bmon,
                            'BYEAR' => $byear,
                            'DPLACE' => $dplace,
                            'GHOS' => $ghos,
                            'CODEPRO' => $codepro,
                            'PROV' => $this->prov_code
                        );
                    
                }
            }
            if(count($data)>0){$rs = $this->excel_import_model->insert($data,$this->prov_code);}else{$rs=0;}
            echo $rs ? $rs:'0';
        }
    }

    function import_thaiqm()
    {
        if (isset($_FILES["file_thaiqm"]["name"])) {
            $path = $_FILES["file_thaiqm"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $data=array();
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 4; $row <= $highestRow; $row++) {
                    $risk1 = 0;
                    $risk2 = 0;
                    $risk3 = 0;
                    $cid = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if ($this->excel_import_model->check_person_cid($cid) == 0) {
                        $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $tel = '';
                        $from_province = get_province_id(str_replace('จังหวัด', '', $worksheet->getCellByColumnAndRow(8, $row)->getValue()));
                        $from_conutry = get_conutry_id($worksheet->getCellByColumnAndRow(8, $row)->getValue());
                        $date_in = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $no = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $moo = $worksheet->getCellByColumnAndRow(11, $row)->getValue();


                        //$province = get_province_id(str_replace('จังหวัด','',$worksheet->getCellByColumnAndRow(15, $row)->getValue()));
                        $province = get_province_id(str_replace('จังหวัด', '', $worksheet->getCellByColumnAndRow(14, $row)->getValue()));
                        //$ampur = get_ampur_id(str_replace('อำเภอ','',$worksheet->getCellByColumnAndRow(14, $row)->getValue(),$province));
                        $ampur = get_ampur_id(str_replace('อำเภอ', '', $worksheet->getCellByColumnAndRow(13, $row)->getValue()), $province);
                        $tambon = get_tambon_id(str_replace('ตำบล', '', $worksheet->getCellByColumnAndRow(12, $row)->getValue()), $ampur);
                        //$tambon = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $in_family = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                        if ($worksheet->getCellByColumnAndRow(2, $row)->getValue() == 'ไม่เคย') {
                            $risk1 = 0;
                        } else if ($worksheet->getCellByColumnAndRow(2, $row)->getValue() == 'เคย') {
                            $risk1 = 1;
                        }
                        if ($worksheet->getCellByColumnAndRow(3, $row)->getValue() == 'ไม่เคย') {
                            $risk2 = 0;
                        } else if ($worksheet->getCellByColumnAndRow(3, $row)->getValue() == 'เคย') {
                            $risk2 = 1;
                        }
                        if ($worksheet->getCellByColumnAndRow(4, $row)->getValue() == 'ไม่เคย') {
                            $risk3 = 0;
                        } else if ($worksheet->getCellByColumnAndRow(4, $row)->getValue() == 'เคย') {
                            $risk3 = 1;
                        }
                        $data[] = array(
                            'd_update' => date("Y-m-d H:i:s"),
                            'cid' => $cid,
                            'name' => $name,
                            'tel' => $tel,
                            'from_province' => $from_province,
                            'from_conutry' => $from_conutry,
                            'date_in' => $date_in,
                            'no' => $no,
                            'moo' => $moo,
                            'tambon' => $tambon,
                            'ampur' => $ampur,
                            'province' => $province,
                            'in_family' => $in_family,
                            'reporter' => 310,
                            'risk1' => $risk1,
                            'risk2' => $risk2,
                            'risk3' => $risk3,
                            'risk4' => 0
                        );
                    }
                }

            }
            //echo count($data);
            if(count($data)>0){$rs = $this->excel_import_model->insert($data);}else{$rs=0;}
            echo $rs ? $rs:'0';
        }
    }
}
