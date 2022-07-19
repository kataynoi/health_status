<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Death_group_stat_model extends CI_Model
{
    function make_datatables($id)
    {
        $sql = "
SELECT
b.name,
a.GROUP_STAT
,SUM(IF( a.dyear=2564 AND a.sex=1,1,0)) as 2564_male
,SUM(IF( a.dyear=2564 AND a.sex=2,1,0)) as 2564_female
,SUM(IF( a.dyear=2564,1,0)) as 2564_all


,SUM(IF( a.dyear=2564-1 AND a.sex=1,1,0)) as 2563_male
,SUM(IF( a.dyear=2564-1 AND a.sex=2,1,0)) as 2563_female
,SUM(IF( a.dyear=2564-1,1,0)) as 2563_all


,SUM(IF( a.dyear=2564-2 AND a.sex=1,1,0)) as 2562_male
,SUM(IF( a.dyear=2564-2 AND a.sex=2,1,0)) as 2562_female
,SUM(IF( a.dyear=2564-2,1,0)) as 2562_all

FROM death_home_44 a 
LEFT JOIN co_groupcode b ON a.GROUP_STAT= b.id
GROUP BY GROUP_STAT

ORDER BY GROUP_STAT
";
        $query = $this->db->query($sql);
        return $query->result();
    }
 public function get_account(){
                        $rs = $this->db
                        ->get("account")
                        ->result();
                        return $rs;}    public function get_account_name($id)
                {
                    $rs = $this->db
                        ->where("id",$id)
                        ->get("account")
                        ->row();
                    return $rs?$rs->name:"";
                }
}