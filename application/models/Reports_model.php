<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Report model
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */
class Reports_model extends CI_Model
{
    public $hospcode;
    public $hserv;

    public function get_sql_report_disease($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->get('sql_report_disease')
            ->row_array();
        return $rs;
    }
    public function get_report_items()
    {
        $rs = $this->db
            ->get('sql_report_disease')
            ->result();
        return $rs;
    }

    public function death_disease($ampur = '', $disease, $year)
    {

        $provcode=$this->config->item('prov_code');
        $table = "death_home_" .$provcode ;

        if ($ampur == '') {
            $where = " ";
            $group = " LEFT(a.lccaattmm,4)";
            $select = "d.ampurname as name,e.all_sex as person_all,e.male as person_male,e.female as person_female";
            $join = " LEFT JOIN (SELECT * FROM pop_ampur WHERE n_year= ".$year." AND provcode=".$provcode.") e ON  d.ampurcodefull = e.ampurcode";
        } else if ($ampur != '') {
            $where = "AND d.ampurcodefull= '" . $ampur . "' ";
            $group = " a.hospcode";
            $select = "c.hosname as name,null as person_all,null as person_male,null as person_female";
            $join = "";
        }

        $sql = "SELECT " . $select . ",count(a.PID) death_total
        ,SUM(IF(a.sex=1,1,0)) as male 
        ,SUM(IF(a.sex=2,1,0)) as female  
        FROM " . $table . " a 
        LEFT JOIN chospital c ON a.HOSPCODE = c.hoscode
        LEFT JOIN (SELECT * FROM campur WHERE changwatcode=44) d ON LEFT(a.lccaattmm,4) = d.ampurcodefull
        ".$join." 
        WHERE 1=1 " . $where . "  AND LEFT(a.lccaattmm,2) ='" . $this->config->item('prov_code') . "'
        AND YEAR_NGOB =" . $year ." ". $disease ." 
        GROUP BY " . $group . ";
        ";
        //echo $sql;
        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();

        return $rs;
    }
    // Runner reports


}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */