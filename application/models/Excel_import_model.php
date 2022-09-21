<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('CustomerID', 'DESC');
		$query = $this->db->get('tbl_customer');
		return $query;
	}

	function insert_death_home($items,$prov_code)
	{
	
		$n = 0;
		$table = 'death_home';
		$this->db->trans_start();
		foreach ($items as $item) {
			$insert_query = $this->db->insert_string($table, $item);
			$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
			$rs = $this->db->query($insert_query);
			if ($rs) {
				$n++;
			}
		}
		$this->db->trans_complete();
		return $n;
	}

	function insert_death_hos($items,$prov_code)
	{
		
		$n = 0;
		$table = 'death_hos';
		$this->db->trans_start();
		foreach ($items as $item) {
			$insert_query = $this->db->insert_string($table, $item);
			$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
			$rs = $this->db->query($insert_query);
			if ($rs) {
				$n++;
			}
		}
		$this->db->trans_complete();
		return $n;
	}
	function insert_birth($items,$prov_code,$import_year)
	{
		//$this->db->insert_batch('person_survey_test', $data);
		$n = 0;
		$table = 'birth_'.$prov_code;
		$rs = $this->db->where('BYEAR', $import_year)->delete($table);
		$this->db->trans_start();
		foreach ($items as $item) {
			$insert_query = $this->db->insert_string($table, $item);
			$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
			$rs = $this->db->query($insert_query);
			if ($rs) {
				$n++;
			}
		}
		$this->db->trans_complete();
		return $n;
	}

}
