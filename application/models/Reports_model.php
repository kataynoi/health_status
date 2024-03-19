<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Report model
 * @author  Mr.Dechachit Kaewmaung <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 */
class Reports_model extends CI_Model
{

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

    public function death_disease($prov="",$ampur = '', $disease, $year)
    {

        $table = "death_home";
        //$prov='45';
        if ($prov==""){
        
            $where = " ";
            $group = " LEFT(a.lccaattmm,2)";
            $select = "d.changwatname as name,e.all_sex as person_all,e.male as person_male,e.female as person_female";
            $join =" LEFT JOIN ( SELECT * FROM cchangwat WHERE zonecode = 07) d ON LEFT (a.lccaattmm, 2) = d.changwatcode";
            $join .= " LEFT JOIN ( SELECT provcode,sum(male) as male, sum(female) as female, sum(all_sex) as all_sex FROM pop_ampur WHERE n_year = ".$year." group by provcode) e ON d.changwatcode = e.provcode";
        } 
        elseif($ampur == '' ) {
            $where = "  AND LEFT(a.lccaattmm,2) ='" . $prov . "'";
            $group = " LEFT(a.lccaattmm,4)";
            $select = "d.ampurname as name,e.all_sex as person_all,e.male as person_male,e.female as person_female";
            $join =" LEFT JOIN (SELECT * FROM campur WHERE changwatcode=".$prov.") d ON LEFT(a.lccaattmm,4) = d.ampurcodefull ";
            $join .= " LEFT JOIN (SELECT * FROM pop_ampur WHERE n_year= " . $year . " AND provcode=" . $prov . ") e ON  d.ampurcodefull = e.ampurcode";
        } else if ($ampur != '') {
            $where = " AND LEFT(a.lccaattmm,2) ='" . $prov . "' AND d.ampurcodefull= '" . $ampur . "' ";
            $group = " a.hospcode";
            $select = "c.hosname as name,null as person_all,null as person_male,null as person_female";
            $join = " LEFT JOIN (SELECT * FROM campur WHERE changwatcode=".$prov.") d ON LEFT(a.lccaattmm,4) = d.ampurcodefull ";
        }
    
        

        $sql = "SELECT " . $select . ",count(a.PID) death_total
        ,SUM(IF(a.sex=1,1,0)) as male 
        ,SUM(IF(a.sex=2,1,0)) as female  
        FROM " . $table . " a 
        LEFT JOIN chospital c ON a.HOSPCODE = c.hoscode
       
        " . $join . " 
        WHERE 1=1 " . $where . " 
        AND a.N_YEAR =" . $year . " " . $disease . " 
        GROUP BY " . $group . ";
        ";
        //echo $sql;
        $rs = $this->db->query($sql)->result();
        //echo "<div style='padding-top: 200px;padding-right: 30px;padding-left: 80px'></div>".$this->db->last_query();

        return $rs;
    }

    
    public function birth($prov='' ,$ampur = '', $year)
    {

        $provcode = $this->config->item('prov_code');
        $table = "birth";
        if ($prov == '') {
            $where = " ";
            $group = " a.prov";
            $select = "d.changwatname as name,e.all_sex as person_all,e.male as person_male,e.female as person_female";
            $join =" LEFT JOIN ( SELECT * FROM cchangwat WHERE zonecode = 07) d ON a.prov = d.changwatcode";
            $join .= " LEFT JOIN (SELECT * FROM pop_ampur WHERE n_year= " . $year . " AND provcode=" . $provcode . ") e ON  d.changwatcode = e.provcode";
        } else if ($ampur == '') {
            $where = "a.prov='".$prov."'";
            $group = " a.ampur";
            $select = "d.ampurname as name,e.all_sex as person_all,e.male as person_male,e.female as person_female";
            $join = " LEFT JOIN (SELECT * FROM pop_ampur WHERE n_year= " . $year . " AND provcode=" . $provcode . ") e ON  d.ampurcodefull = e.ampurcode";
        } else if ($ampur != '') {
            $where = "AND d.ampurcodefull= '" . $ampur . "' ";
            $group = " a.hospcode";
            $select = "c.hosname as name,null as person_all,null as person_male,null as person_female";
            $join = "";
        }

        $sql = "SELECT " . $select . ",count(a.PROV) death_total
        ,SUM(IF(a.sex=1,1,0)) as male 
        ,SUM(IF(a.sex=2,1,0)) as female  
        FROM " . $table . " a 
        " . $join . " 
        WHERE 1=1 " . $where . "
        AND BYEAR =" . $year . "
        GROUP BY " . $group . ";
        ";
        echo $sql;
        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();

        return $rs;
    }



    public function year_death_home($year)
    {
        $rs = $this->db
            ->where('DYEAR', $year)
            ->get('death_home')
            ->result();
    }
    public function deathInMonth($prov)
    {

        $sql ="SELECT DATE_FORMAT(a.D_DEATH,'%Y') as n_year,COUNT(PID) as total
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='01',1,0)) as M01
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='02',1,0)) as M02
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='03',1,0)) as M03
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='04',1,0)) as M04
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='05',1,0)) as M05
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='06',1,0)) as M06
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='07',1,0)) as M07
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='08',1,0)) as M08
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='09',1,0)) as M09
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='10',1,0)) as M10
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='11',1,0)) as M11
        ,SUM(IF(DATE_FORMAT(a.D_DEATH,'%m')='12',1,0)) as M12
        
        FROM death_home a 
        WHERE a.PROV='".$prov."' 
        GROUP BY DATE_FORMAT(a.D_DEATH,'%Y') ORDER BY DATE_FORMAT(a.D_DEATH,'%Y') DESC";
        $rs = $this->db->query($sql)->result();
       // echo $this->db->last_query();
        return $rs;
    }


    public function top10_298($prov="",$ampur = '', $disease, $year)
    {

        $table = "death_home";
        //$prov='45';
        if ($prov==""){
        
            $where = " ";
            $group = " LEFT(a.lccaattmm,2)";
            $select = "d.changwatname as name,e.all_sex as person_all,e.male as person_male,e.female as person_female";
            $join =" LEFT JOIN ( SELECT * FROM cchangwat WHERE zonecode = 07) d ON LEFT (a.lccaattmm, 2) = d.changwatcode";
            $join .= " LEFT JOIN ( SELECT provcode,sum(male) as male, sum(female) as female, sum(all_sex) as all_sex FROM pop_ampur WHERE n_year = ".$year." group by provcode) e ON d.changwatcode = e.provcode";
        } 
        elseif($ampur == '' ) {
            $where = "  AND LEFT(a.lccaattmm,2) ='" . $prov . "'";
            $group = " LEFT(a.lccaattmm,4)";
            $select = "d.ampurname as name,e.all_sex as person_all,e.male as person_male,e.female as person_female";
            $join =" LEFT JOIN (SELECT * FROM campur WHERE changwatcode=".$prov.") d ON LEFT(a.lccaattmm,4) = d.ampurcodefull ";
            $join .= " LEFT JOIN (SELECT * FROM pop_ampur WHERE n_year= " . $year . " AND provcode=" . $prov . ") e ON  d.ampurcodefull = e.ampurcode";
        } else if ($ampur != '') {
            $where = " AND LEFT(a.lccaattmm,2) ='" . $prov . "' AND d.ampurcodefull= '" . $ampur . "' ";
            $group = " a.hospcode";
            $select = "c.hosname as name,null as person_all,null as person_male,null as person_female";
            $join = " LEFT JOIN (SELECT * FROM campur WHERE changwatcode=".$prov.") d ON LEFT(a.lccaattmm,4) = d.ampurcodefull ";
        }
    
        

        $sql = "SELECT " . $select . ",count(a.PID) death_total
        ,SUM(IF(a.sex=1,1,0)) as male 
        ,SUM(IF(a.sex=2,1,0)) as female  
        FROM " . $table . " a 
        LEFT JOIN chospital c ON a.HOSPCODE = c.hoscode
       
        " . $join . " 
        WHERE 1=1 " . $where . " 
        AND a.N_YEAR =" . $year . " " . $disease . " 
        GROUP BY " . $group . ";
        ";
        //echo $sql;
        $rs = $this->db->query($sql)->result();
        //echo "<div style='padding-top: 200px;padding-right: 30px;padding-left: 80px'></div>".$this->db->last_query();

        return $rs;
    }
}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */