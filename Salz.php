<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Salz Library v1.13.1
 * Created By Mochammad Faisal
 *
 * Create Date 2019-03-01 13:20
 * Last Update 2021-11-15 13:34:00
 *
 *
 */

class Salz {
	public function __construct() {
		date_default_timezone_set("Asia/Jakarta");
		$this->CI = &get_instance();

		$this->CI->load->library('session');
		$this->CI->load->library('upload');
		$this->CI->load->helper('url');
		$this->db = $this->CI->load->database('default', true);

		$this->sess   = $this->CI->session->userdata('auth');
		$this->userid = (isset($this->sess['userid']) ? $this->sess['userid'] : '');
	}

    // save function

	public function insertData($table, $data, $is_create_date = true) {
		if ($is_create_date) {
			$data['date_create'] = date_now;
			$data['user_create'] = $this->userid;
		}

		return $this->db->insert($table, $data);
	}

	public function insertData_batch($table, $data, $is_create_date = true) {
		if ($is_create_date) {
			$new_data = array();

			foreach ($data as $key => $value) {
				$value['date_create'] = date_now;
				$value['user_create'] = $this->userid;

				$new_data[] = $value;
			}
			$data = $new_data;
		}

		return $this->db->insert_batch($table, $data);
	}

	public function insertData_batch_chunk($table, $data, $is_create_date = true, $chunk = 100) {
		if ($is_create_date) {
			$new_data = array();

			foreach ($data as $key => $value) {
				$value['date_create'] = date_now;
				$value['user_create'] = $this->userid;

				$new_data[] = $value;
			}
			$data = $new_data;
		}

		$this->db->trans_start();

		$chunk1 = array_chunk($data, $chunk);

		foreach ($chunk1 as $key => $vals) {
			$this->db->insert_batch($table, $vals);
		}

		return $this->db->trans_complete();
	}

	public function insertDataID($table, $data, $is_create_date = true) {
		if ($is_create_date) {
			$data['date_create'] = date_now;
			$data['user_create'] = $this->userid;
		}

        // return last insert id
		$insert    = $this->db->insert($table, $data);
		$insert_id = '';

		if ($insert) {
			$insert_id = $this->db->insert_id();
		} else {
			$insert_id = '';
		}

		return $insert_id;
	}

	public function updateData($table, $data, $where = array(), $is_update_date = true) {
		if ($is_update_date) {
			$data['date_update'] = date_now;
			$data['user_update'] = $this->userid;
		}

		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		return $this->db->update($table, $data);
	}

	public function updateDataArr($table, $data, $whereCond = array(), $is_update_date = true) {
		if ($is_update_date) {
			$data['date_update'] = date_now;
			$data['user_update'] = $this->userid;
		}

		if (!empty($whereCond)) {
			if (isset($whereCond['where']) && !empty($whereCond['where'])) {
				foreach ($whereCond['where'] as $key => $value) {
					$this->db->where($key, $value);
				}
			}

			if (isset($whereCond['where_in']) && !empty($whereCond['where_in'])) {
				foreach ($whereCond['where_in'] as $key => $value) {
					$this->db->where_in($key, $value);
				}
			}

			if (isset($whereCond['where_not_in']) && !empty($whereCond['where_not_in'])) {
				foreach ($whereCond['where_not_in'] as $key => $value) {
					$this->db->where_not_in($key, $value);
				}
			}
		}

		return $this->db->update($table, $data);
	}

	public function updateData2($table, $data, $where = array(), $is_update_date = true) {
        // escaped set value
		if ($is_update_date) {
			$data['date_update'] = "'" . date_now . "'";
			$data['user_update'] = $this->userid;
		}

		foreach ($data as $key => $value) {
			$this->db->set($key, $value, false);
		}

		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		return $this->db->update($table);
	}

	public function updateData_batch($table, $data, $FieldValueID = null, $is_update_date = true) {
		if ($is_update_date) {
			$new_data = array();
			foreach ($data as $key => $value) {
				$value['date_update'] = date_now;
				$value['user_update'] = $this->userid;

				$new_data[] = $value;
			}
			$data = $new_data;
		}

		return $this->db->update_batch($table, $data, $FieldValueID);
	}

	public function updateData_batch2($table, $data, $FieldValueID = null, $where = array(), $is_update_date = true) {
		if ($is_update_date) {
			$new_data = array();
			foreach ($data as $key => $value) {
				$value['date_update'] = date_now;
				$value['user_update'] = $this->userid;

				$new_data[] = $value;
			}
			$data = $new_data;
		}

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		return $this->db->update_batch($table, $data, $FieldValueID);
	}

	public function updateData_batch_chunk($table, $data, $FieldValueID = null, $where = array(), $is_update_date = true, $chunk = 100) {
		if ($is_update_date) {
			$new_data = array();
			foreach ($data as $key => $value) {
				$value['date_update'] = date_now;
				$value['user_update'] = $this->userid;

				$new_data[] = $value;
			}
			$data = $new_data;
		}

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		$this->db->trans_start();

		$chunk1 = array_chunk($data, $chunk);

		foreach ($chunk1 as $key => $vals) {
			$this->db->update_batch($table, $vals, $FieldValueID);
		}

		return $this->db->trans_complete();
	}

	public function deleteData($table, $where = array()) {
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}

		return $this->db->delete($table);
	}

    // upload function
	public function uploadsData($inputpostName, $config = array(), $with_default = false) {
		if (!empty($config)) {
			if ($with_default == true) {
				$new_namez = $_FILES[$inputpostName]['name'];
				$new_name  = microtime(true) . '.' . substr(strtolower(strrchr($new_namez, ".")), 1);
                // $configz['file_name'] = $new_name;
				$configz = array(
					'file_name'     => $new_name,
					'upload_path'   => './assets/uploads/',
                    // 'allowed_types' => 'gif|jpg|jpeg|png|bmp|pdf',
                    // 'encrypt_name' => true,
					'allowed_types' => '*',
					'max_size'      => '3000000',
					'remove_spaces' => true,
				);
			}

			foreach ($config as $key => $value) {
				$configz[$key] = $value;
			}
		} else {
			$new_namez = $_FILES[$inputpostName]['name'];
			$new_name  = microtime(true) . '.' . substr(strtolower(strrchr($new_namez, ".")), 1);
            // $configz['file_name'] = $new_name;
			$configz = array(
				'file_name'     => $new_name,
				'upload_path'   => './assets/uploads/',
                // 'allowed_types' => 'gif|jpg|jpeg|png|bmp|pdf',
                // 'encrypt_name' => true,
				'allowed_types' => '*',
				'max_size'      => '3000000',
				'remove_spaces' => true,
			);
		}
        // $this->load->library('upload', $configz);

        // if(substr($configz['upload_path'], 0, 2) === "./"){

		$mkdir_path = $configz['upload_path'];
        // $mkdir_path = substr_replace($mkdir_path, '', 0, 2);

        // if(!file_exists($mkdir_path)){
        //     @mkdir($mkdir_path, 0755, TRUE);
        //     @chmod($mkdir_path, 0755);
        // }

		if (!is_dir($mkdir_path)) {
            // check directory is exist
            // create recursive directory
            // 0755 => without public write
            // 0777 => with public write

			@mkdir($mkdir_path, 0777, true);
		}

        // }

		$this->CI->upload->initialize($configz);

		if (!$this->CI->upload->do_upload($inputpostName)) {
			$error = $this->CI->upload->display_errors();
            // print_r($error);

			return array('success' => false, 'data' => $error);
		} else {
			$dataUpload = $this->CI->upload->data();
            // $filename = $dataUpload['file_name'];
			$data = array(
				'filename' => $dataUpload['file_name'],
				'filetype' => $dataUpload['file_type'],
				'filesize' => $dataUpload['file_size'],
			);

			return array('success' => true, 'data' => $data);
		}
	}

    //method untuk upload gambar menggunakan plugin froala text editor
	public function uploadsDataLink($inputpostName, $config = array(), $with_default = false) {
		if (!empty($config)) {
			if ($with_default == true) {
				$new_namez = $_FILES[$inputpostName]['name'];
				$new_name  = microtime(true) . '.' . substr(strtolower(strrchr($new_namez, ".")), 1);
                // $configz['file_name'] = $new_name;
				$configz = array(
					'file_name'     => $new_name,
					'upload_path'   => './assets/uploads/',
					'allowed_types' => 'jpg|jpeg|png',
                    // 'encrypt_name' => true,
					'allowed_types' => '*',
					'max_size'      => '3000000',
					'remove_spaces' => true,
				);
			}

			foreach ($config as $key => $value) {
				$configz[$key] = $value;
			}
		} else {
			$new_namez = $_FILES[$inputpostName]['name'];
			$new_name  = microtime(true) . '.' . substr(strtolower(strrchr($new_namez, ".")), 1);
            // $configz['file_name'] = $new_name;
			$configz = array(
				'file_name'     => $new_name,
				'upload_path'   => './assets/uploads/',
				'allowed_types' => 'jpg|jpeg|png',
                // 'encrypt_name' => true,
				'allowed_types' => '*',
				'max_size'      => '3000000',
				'remove_spaces' => true,
			);
		}
        // $this->load->library('upload', $configz);

		$mkdir_path = $configz['upload_path'];
		if (!is_dir($mkdir_path)) {
            // check directory is exist
            // create recursive directory
			@mkdir($mkdir_path, 0777, true);
		}

		$this->CI->upload->initialize($configz);

		if (!$this->CI->upload->do_upload($inputpostName)) {
			$error = $this->CI->upload->display_errors();
            // print_r($error);

			return array('success' => false, 'data' => $error);
		} else {
			$dataUpload = $this->CI->upload->data();
            // $filename = $dataUpload['file_name'];
            // $data = array(
            //     'filename'=>$dataUpload['file_name'],
            //     'filetype'=>$dataUpload['file_type'],
            //     'filesize'=>$dataUpload['file_size']
            // );
			$data = './assets/uploads/' . $dataUpload['file_name'];

			return array('success' => true, 'link' => $data, 'thumbnail' => $dataUpload['file_name']);
            // return array('success'=>true, 'data'=>$data);
		}
	}

    // Get Function

	function get_query($query_final) {
		$result = $this->db->query($query_final)->result_array();
		return $result;
	}

	public function getWhereArr($select, $from, $whereCond = array(), $order = array(), $limit = array()) {
		$this->db->select($select);
		$this->db->from($from);

        // print_r($whereCond);exit();

		if (!empty($whereCond)) {
			if (isset($whereCond['where']) && !empty($whereCond['where'])) {
				foreach ($whereCond['where'] as $key => $value) {
					$this->db->where($key, $value);
				}
			}

			if (isset($whereCond['where_in']) && !empty($whereCond['where_in'])) {
				foreach ($whereCond['where_in'] as $key => $value) {
					$this->db->where_in($key, $value);
				}
			}

			if (isset($whereCond['where_not_in']) && !empty($whereCond['where_not_in'])) {
				foreach ($whereCond['where_not_in'] as $key => $value) {
					$this->db->where_not_in($key, $value);
				}
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			if (isset($limit[1])) {
				$this->db->limit($limit[0], $limit[1]);
			} else {
				$this->db->limit($limit[0]);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereArr2($select, $from, $whereCond = array(), $group = array(), $order = array(), $limit = array()) {
		$this->db->select($select);
		$this->db->from($from);

        // print_r($whereCond);exit();

		if (!empty($whereCond)) {
			if (isset($whereCond['where']) && !empty($whereCond['where'])) {
				foreach ($whereCond['where'] as $key => $value) {
					$this->db->where($key, $value);
				}
			}

			if (isset($whereCond['where_in']) && !empty($whereCond['where_in'])) {
				foreach ($whereCond['where_in'] as $key => $value) {
					$this->db->where_in($key, $value);
				}
			}

			if (isset($whereCond['where_not_in']) && !empty($whereCond['where_not_in'])) {
				foreach ($whereCond['where_not_in'] as $key => $value) {
					$this->db->where_not_in($key, $value);
				}
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			if (isset($limit[1])) {
				$this->db->limit($limit[0], $limit[1]);
			} else {
				$this->db->limit($limit[0]);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereArr3($select, $from, $join = array(), $joinCond = array(), $whereCond = array(), $group = array(), $order = array(), $limit = array()) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($whereCond)) {
			if (isset($whereCond['where']) && !empty($whereCond['where'])) {
				foreach ($whereCond['where'] as $key => $value) {
					$this->db->where($key, $value);
				}
			}

			if (isset($whereCond['or_where']) && !empty($whereCond['or_where'])) {
				foreach ($whereCond['or_where'] as $key => $value) {
					$this->db->or_where($key, $value);
				}
			}

			if (isset($whereCond['where_query']) && !empty($whereCond['where_query'])) {
                /*
				Example :

				'where_query'=> array(
				'field_reff' => array(
					'key'=> 'IN',
					'value'=> '( SELECT field FROM m_table WHERE delete_status != "1" )'
				),*/

				foreach ($whereCond['where_query'] as $key => $value) {
					$key_ = $value['key'];
					$val_ = $value['value'];
					$this->db->where($key . ' ' . $key_ . ' ' . $val_);
				}
			}

			if (isset($whereCond['where_in']) && !empty($whereCond['where_in'])) {
				foreach ($whereCond['where_in'] as $key => $value) {
					$this->db->where_in($key, $value);
				}
			}

			if (isset($whereCond['where_not_in']) && !empty($whereCond['where_not_in'])) {
				foreach ($whereCond['where_not_in'] as $key => $value) {
					$this->db->where_not_in($key, $value);
				}
			}
		}

		if (!empty($join)) {
			$countJoin = (count($join) > 0 ? count($join) : count($join) + 1);
			$i         = 0;
			foreach ($join as $key => $value) {
				if (!empty($joinCond)) {
					$this->db->join($key, $value, $joinCond[$i]);
				} else {
					$this->db->join($key, $value);
				}

				$i++;
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			if (isset($limit[1])) {
				$this->db->limit($limit[0], $limit[1]);
			} else {
				$this->db->limit($limit[0]);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereReplace($select, $from, $where = array(), $replace = '') {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		$get  = $this->db->get();
		$data = $get->row_array();
		$num  = $get->num_rows();
		if ($num > 0) {
			return $data[$select];
		} else {
			if (!empty($replace)) {
                //Replace if result got false
				if (is_numeric($replace)) {
					return $data[$select];
				} else {
					return $replace;
				}
			} else {
				return '';
			}
		}
	}

	public function getWhere($select, $from, $where = array(), $order = array(), $is_array = true, $is_result = true) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();
		if ($is_array == false) {
			if ($is_result == false) {
				return $get;
			} else {
				return $get->result();
			}
		} else {
			return $get->result_array();
		}
	}

	public function getWhereGroup($select, $from, $where = array(), $group = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($group)) {
			foreach ($group as $key => $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereGroupLike($select, $from, $where = array(), $like = array(), $group = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($like)) {
			foreach ($like as $key => $value) {
				$this->db->like($key, $value);
			}
		}

		if (!empty($group)) {
			foreach ($group as $key => $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhere_GroupAND($select, $from, $where = array(), $where_group = array(), $group = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($where_group)) {
			$this->db->group_start();
			foreach ($where_group as $key => $value) {
				$this->db->where($key, $value);
			}
			$this->db->group_end();
		}

		if (!empty($group)) {
			foreach ($group as $key => $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhere_GroupANDOR($select, $from, $where = array(), $where_group = array(), $group = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($where_group)) {
			$this->db->group_start();
			foreach ($where_group as $key => $value) {
				$this->db->or_where($key, $value);
			}
			$this->db->group_end();
		}

		if (!empty($group)) {
			foreach ($group as $key => $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereIN($select, $from, $where = array(), $whereIN = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($whereIN)) {
			foreach ($whereIN as $key => $value) {
				$this->db->where_in($key, $value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereINLimit($select, $from, $where = array(), $whereIN = array(), $order = array(), $limit = '') {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($whereIN)) {
			foreach ($whereIN as $key => $value) {
				$this->db->where_in($key, $value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			$this->db->limit($limit);
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereLimit($select, $from, $where = array(), $order = array(), $limit = '', $start = '', $isResultArray = true) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			if (!empty($start)) {
				$this->db->limit($limit, $start);
			} else {
				$this->db->limit($limit);
			}
		}

		$get = $this->db->get();

		return $isResultArray ? $get->result_array() : $get->result();
	}

	public function countAllWhereOnly($select, $from, $where) {
		$countAll = 0;

		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		$countAll = $this->db->get();

		return $countAll->num_rows();
	}

	public function getWhereRow($select, $from, $where = array(), $order = array(), $single = true) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if($single){
			$this->db->limit(1);
		}

		$get   = $this->db->get();
		$hasil = $get->row_array();
		$result = '';

		if ($single == false) {
			$result = @$hasil;
		} else {
			$result = @$hasil[$select];
		}
		return $result;
	}

	public function getWhereRowLimit($select, $from, $where = array(), $order = array(), $single = true, $limit = '') {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			$this->db->limit($limit);
		}

		$get   = $this->db->get();
		$hasil = $get->row_array();
		if ($single == false) {
			return $hasil;
		} else {
			return $hasil[$select];
		}
	}

	public function getWhereOrder($select, $from, $where = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereJoin($select, $from, $join = array(), $where = array(), $order = '') {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key, $value);
			}
		}

		if (!empty($order)) {
			$this->db->order_by($order);
		}
		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereJoin2($select, $from, $join = array(), $joinCond = array(), $where = array(), $group = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($join)) {
			$countJoin = (count($join) > 0 ? count($join) : count($join) + 1);
			$i         = 0;
			foreach ($join as $key => $value) {
				if (!empty($joinCond)) {
					$this->db->join($key, $value, $joinCond[$i]);
				} else {
					$this->db->join($key, $value);
				}

				$i++;
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereJoinGroup($select, $from, $join = array(), $where = array(), $group = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key, $value);
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereJoinGroupLimit($select, $from, $join = array(), $where = array(), $group = '', $order = array(), $limit = '') {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key, $value);
			}
		}

		if (!empty($group)) {
			$this->db->group_by($group);
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			$this->db->limit($limit);
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereJoinLeft($select, $from, $join = array(), $where = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key, $value, 'left');
			}
		}

		if (!empty($group)) {
			foreach ($group as $key => $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		$get = $this->db->get();

		return $get->result_array();
	}
	public function getWhereJoinLeftGroup($select, $from, $join = array(), $where = array(), $group = array(), $order = array()) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key, $value, 'left');
			}
		}

		if (!empty($group)) {
			foreach ($group as $key => $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			$this->db->order_by($order);
		}
		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereOR($select, $from, $where = array(), $where_or = array()) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, "'" . $value . "'", false);
			}
		}

		if (!empty($where_or)) {
			foreach ($where_or as $key => $value) {
				$this->db->or_where($key, "'" . $value . "'", false);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereLike($select, $from, $where = array(), $like = array()) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($like)) {
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->like($key, $value);
			}
		}
		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereLikeOrderGroup($select, $from, $where = array(), $like = array(), $order = array(), $group = array()) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($like)) {
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->like($key, $value);
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereLikeOrderGroupLimit($select, $from, $where = array(), $like = array(), $order = array(), $group = array(), $limit = '') {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($like)) {
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->like($key, $value);
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			$this->db->limit($limit);
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereORLikeJoin($select, $from, $where = array(), $like = array(), $join = array(), $joinCond = array(), $order = array(), $group = array(), $limit = array()) {
        // or like
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (!empty($like)) {
			$this->db->group_start();
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->or_like($key, $value);
			}
			$this->db->group_end();
		}

		if (!empty($join)) {
			$countJoin = (count($join) > 0 ? count($join) : count($join) + 1);
			$i         = 0;
			foreach ($join as $key => $value) {
				if (!empty($joinCond)) {
					$this->db->join($key, $value, $joinCond[$i]);
				} else {
					$this->db->join($key, $value);
				}

				$i++;
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			if (isset($limit[1])) {
				$this->db->limit($limit[0], $limit[1]);
			} else {
				$this->db->limit($limit[0]);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getLikeArr($select, $from, $whereCond = array(), $like = array(), $join = array(), $joinCond = array(), $order = array(), $group = array(), $limit = array()) {
        // or like
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($whereCond)) {
			if (isset($whereCond['where']) && !empty($whereCond['where'])) {
				foreach ($whereCond['where'] as $key => $value) {
					$this->db->where($key, $value);
				}
			}

			if (isset($whereCond['where_in']) && !empty($whereCond['where_in'])) {
				foreach ($whereCond['where_in'] as $key => $value) {
					$this->db->where_in($key, $value);
				}
			}

			if (isset($whereCond['where_not_in']) && !empty($whereCond['where_not_in'])) {
				foreach ($whereCond['where_not_in'] as $key => $value) {
					$this->db->where_not_in($key, $value, false);
				}
			}
		}

		if (!empty($like)) {
			$this->db->group_start();
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->or_like($key, $value);
			}
			$this->db->group_end();
		}

		if (!empty($join)) {
			$countJoin = (count($join) > 0 ? count($join) : count($join) + 1);
			$i         = 0;
			foreach ($join as $key => $value) {
				if (!empty($joinCond)) {
					$this->db->join($key, $value, $joinCond[$i]);
				} else {
					$this->db->join($key, $value);
				}

				$i++;
			}
		}

		if (!empty($group)) {
			foreach ($group as $value) {
				$this->db->group_by($value);
			}
		}

		if (!empty($order)) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}

		if (!empty($limit)) {
			if (isset($limit[1])) {
				$this->db->limit($limit[0], $limit[1]);
			} else {
				$this->db->limit($limit[0]);
			}
		}

		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereIN_SETLike($select, $from, $where = array(), $like = array(), $in_set = array(), $cond_inset = false) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($in_set)) {
			foreach ($in_set as $key => $value) {
				if ($cond_inset == true) {
                    //memunculkan data yang sama dengan $value
					$cond_insetx = "!= ";
				} else {
                    //memunculkan data yang tidak sama dengan $value
					$cond_insetx = "= ";
				}

				$find = 'FIND_IN_SET(`' . $key . '`, \'' . $value . '\' )' . $cond_insetx;

				$this->db->where($find, 0);
			}
		}

		if (!empty($like)) {
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->like($key, $value);
			}
		}
		$get = $this->db->get();

		return $get->result_array();
	}

	public function getWhereNum($select, $from, $where = array(), $count = false, $rows = true) {
		$this->db->select($select);
		$this->db->from($from);
		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		$get    = $this->db->get();
		$hasil  = $get->row_array();
		$hasil2 = $get->result_array();
		$num    = $get->num_rows();

		if ($num > 0) {
			if ($count == true) {
				return $num;
			} else {
				if ($rows == false) {
					return $hasil2;
				} else {
					return $hasil[$select];
				}
			}
		} else {
			return 0;
		}
	}

	public function getWhereNumLike($select, $from, $where = array(), $like = array(), $count = false, $rows = true) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($like)) {
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->like($key, $value);
			}
		}

		$get    = $this->db->get();
		$hasil  = $get->row_array();
		$hasil2 = $get->result_array();
		$num    = $get->num_rows();

		if ($num > 0) {
			if ($count == true) {
				return $num;
			} else {
				if ($rows == false) {
					return $hasil2;
				} else {
					return $hasil[$select];
				}
			}
		} else {
			return 0;
		}
	}

	public function getWhereNumLikeOR($select, $from, $where = array(), $like = array(), $or_like = array(), $count = false, $rows = true) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (!empty($like)) {
			foreach ($like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->like($key, $value);
			}
		}

		if (!empty($or_like)) {
			foreach ($or_like as $key => $value) {
				$value = $this->db->escape_like_str($value);
				$this->db->or_like($key, $value);
			}
		}

		$get    = $this->db->get();
		$hasil  = $get->row_array();
		$hasil2 = $get->result_array();
		$num    = $get->num_rows();

		if ($num > 0) {
			if ($count == true) {
				return $num;
			} else {
				if ($rows == false) {
					return $hasil2;
				} else {
					return $hasil[$select];
				}
			}
		} else {
			return 0;
		}
	}

	public function getWhereNumJoin($select, $from, $where = array(), $join = array(), $count = false, $rows = true) {
		$this->db->select($select);
		$this->db->from($from);

		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key, $value);
			}
		}

		if (!empty($where)) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		$get    = $this->db->get();
		$hasil  = $get->row_array();
		$hasil2 = $get->result_array();
		$num    = $get->num_rows();

		if ($num > 0) {
			if ($count == true) {
				return $num;
			} else {
				if ($rows == false) {
					return $hasil2;
				} else {
					return $hasil[$select];
				}
			}
		} else {
			return 0;
		}
	}

	public function limit_txt($text, $limit = 500, $replace = false, $replace_txt = array()) {
		$string = strip_tags($text);
		if (strlen($string) > $limit) {
            // truncate string
			$stringCut = substr($string, 0, $limit);
			$endPoint  = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
			$string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
			$string .= ' ...';
            // $string .= '... <a href="/this/story">Read More</a>';
		}

		if ($replace == true) {
			$string = str_replace($replace_txt[0], $replace_txt[1], $string);

			return $string;
		} else {
			return $string;
		}
	}

	public function newline_txt($text, $width = 12, $break = "\n", $cut = false) {
		$string = wordwrap($text, $width, $break, $cut);

		return $string;
	}

	public function formatDate($date, $format = '') {
		if (!empty($format)) {
			$format = $format;
		} else {
			$format = 'd M, Y';
            // $format = 'd-m-Y';
		}

		if ($date == '0000-00-00' || $date == '') {
			$hasil = '--';
		} else {
			$hasil = date($format, strtotime($date));
		}

		return $hasil;
	}

	public function formatDate2($tanggal, $format) {
		$bulan = array(
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember',
		);
		$pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
		if ($format == 'm' || 'M') {
            // return $bulan[(int)];
		} else {
			return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
		}
	}

	public function formatBulan($tgl) {
		$bulan = array(
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember',
		);

		return $bulan[(int) $tgl];
	}

	public function timeAgo($timestamp) {
		$datetime1 = new DateTime("now");
		$datetime2 = date_create($timestamp);
		$diff      = date_diff($datetime1, $datetime2);
		$timemsg   = '';
		if ($diff->y > 0) {
			$timemsg = $diff->y . ' year' . ($diff->y > 1 ? "'s" : '');
		} elseif ($diff->m > 0) {
			$timemsg = $diff->m . ' month' . ($diff->m > 1 ? "'s" : '');
		} elseif ($diff->d > 0) {
			$timemsg = $diff->d . ' day' . ($diff->d > 1 ? "'s" : '');
		} elseif ($diff->h > 0) {
			$timemsg = $diff->h . ' hour' . ($diff->h > 1 ? "'s" : '');
		} elseif ($diff->i > 0) {
			$timemsg = $diff->i . ' minute' . ($diff->i > 1 ? "'s" : '');
		} elseif ($diff->s > 0) {
			$timemsg = $diff->s . ' second' . ($diff->s > 1 ? "'s" : '');
		}

		$timemsg = $timemsg . ' ago';

		return $timemsg;
	}

	public function persen($val1, $val2, $is_rounded = true, $rounded_digit = 2, $dec_point = '.') {
		if ($val2 != 0) {
			$result = ($val1 * 100) / $val2;
            // $result = ($val2 / $val1) * 100 ;
		} else {
			$result = 0;
		}

		if ($is_rounded) {
			$result = round($result, $rounded_digit);
		}

		if ($dec_point != '.') {
			$result = str_replace('.', $dec_point, $result);
		}

		return $result . ' %';
	}

	public function pagination($table, $site_url, $limit = 10) {
		$page_limit = $limit;
		$from       = $this->input->get("page");

		$data['total'] = $this->getWhereNum('id', $table, array(), true);

		$page  = (!empty($this->input->get('page'))) ? $this->input->get('page') : 1;
		$mulai = ($page > 1 && !empty($page)) ? ($page * $page_limit) - $page_limit : 0;

		$data['pages'] = ceil($data['total'] / $page_limit);

		$config['page_query_string'] = true;
        // custom quuery parameter string page ^_^
		$config['query_string_segment'] = 'page';

		$config['base_url']         = site_url($site_url);
		$config['first_url']        = $config['base_url'] . '?' . $config['query_string_segment'] . '=1';
		$config['total_rows']       = $data['total'];
		$config['per_page']         = $page_limit;
		$config['use_page_numbers'] = true;
        // $config['num_links'] = 2;
        // $config['anchor_class'] = 'class="number"';
		$config['attributes'] = array('class' => 'page-numbers');

		$config['full_tag_open']  = '<div class="paginate_links" style="float : unset;">';
		$config['full_tag_close'] = "</div>";
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
		$config['cur_tag_open']  = '<span class="page-numbers current">';
		$config['cur_tag_close'] = "</span>";
        // $config['last_link'] = true;
        // $config['next_tag_open'] = "<li>";
        // $config['next_tagl_close'] = "</li>";
        // $config['prev_tag_open'] = "<li>";
        // $config['prev_tagl_close'] = "</li>";
        // $config['first_tag_open'] = "<li>";
        // $config['first_tagl_close'] = "</li>";
        // $config['last_tag_open'] = "<li>";
        // $config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);

		return array('limit' => $page_limit, 'start' => $mulai);
	}

	public function fetch_data($limit, $start, $filter = '') {
		$this->db->select("*");
		$this->db->from(tbl_content);
		if (!empty($filter)) {
			$this->db->where_in('kategori', $filter);
		}
		$this->db->order_by("id", "DESC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query;
	}

	public function SumArray($array) {
        //harus key yg duplicatenya adalah nama
        //harus key yg countnya adalah total
		$sum = array_reduce($array, function ($a, $b) {
			if (isset($a[$b['nama']])) {
				$a[$b['nama']]['total'] += $b['total'];
			} else {
				$a[$b['nama']] = $b;
			}

			return $a;
		});

		return array_values($sum);
	}

    /*

    Array function

     */

    public function objectToArray($d) {
    	if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
    		$d = get_object_vars($d);
    	}

    	if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map($this->objectToArray($d), $d);
        } else {
            // Return array
        	return $d;
        }
    }

    public function object_to_array($data) {
    	if (is_array($data) || is_object($data)) {
    		$result = array();
    		foreach ($data as $key => $value) {
    			$result[$key] = $this->object_to_array($value);
    		}

    		return $result;
    	}

    	return $data;
    }

    public function arrayToObject($d) {
    	if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return object
        	return $d;
        }
    }

    public function objectToArray2($dataJson) {
    	$data = array();

    	foreach ($dataJson as $key => $value) {
            # Remove ' from value
    		$value = str_replace("'", '', $value);

            # Set value as array not as array object from json_encode
    		$value = (array) json_decode($value, true);

            # Pushing into $old_data
    		$data = $value;
    	}

    	return $data;
    }

    /**
     * Builds a tree array.
     * call function on looping values
     * ex : buildTree($row, $parentId)
     *
     * refference : https://stackoverflow.com/a/13878662/10351006
     * @param  array   $data     The data array
     * @param  integer $parentId The parent identifier
     * @return array   The tree.
     */
    public function buildTree($data = array(), $parentId = 0, $parentIndex = 'parent_id', $idIndex = 'id', $is_counted_children = false) {
    	$branch     = array();
    	$sort_index = 1;

    	foreach ($data as $element) {
    		$element['sort_index'] = $sort_index;

    		if ($element[$parentIndex] == $parentId) {
    			$children = $this->buildTree($data, $element[$idIndex], $parentIndex, $idIndex, $is_counted_children);

    			if ($children) {
    				if ($is_counted_children) {
    					$element['count_child'] = count($children);
    				}
    				$element['children'] = $children;
    			}
                // else{
                // $element['count_child'] = 1;
                // }

    			$branch[] = $element;
    		}

    		$sort_index++;
    	}

    	return $branch;
    }

	function genTreeList($datas, $parent_id = 0, $depth = 0, $index_id='id', $index_parent='parent_id') {
		// refference : https://stackoverflow.com/a/14740843/10351006
		// $datas must be array_values / reset index first

		$ni = count($datas);

		if ($ni === 0 || $depth > 1000) return ''; // Make sure not to have an endless recursion
		$tree = '';

		for ($i = 0; $i < $ni; $i++) {
			if ($datas[$i][$index_parent] == $parent_id) {
				$tree .= str_repeat('-', $depth);
				$tree .= $datas[$i]['text'] . '<br/>';
				$tree .= $this->genTreeList($datas, $datas[$i][$index_id], $depth + 1);
			}
		}
		return $tree;
	}

    /**
     * destroy tree stucture / buildTree array
     *
     * @param  <type>  $jsonArray   must convert json object to json array
     * @param  integer $parentID    The parent id
     * @param  string  $parentIndex The parent index
     * @param  string  $idIndex     The identifier index
     * @param  boolean  $withOtherData     boolean
     * @return array   ( description_of_the_return_value )
     */

    public function parseJsonArray($jsonArray, $parentID = 0, $parentIndex = 'parent_id', $idIndex = 'id', $withOtherData = false) {
    	$return = array();

    	foreach ($jsonArray as $subArray) {
    		$returnSubSubArray = array();

    		if (isset($subArray['children'])) {
    			$returnSubSubArray = $this->parseJsonArray($subArray['children'], $subArray[$idIndex]);
    		}

    		if ($withOtherData) {
    			unset($subArray['children']);

    			$return[] = array($idIndex => $subArray[$idIndex], $parentIndex => $parentID, 'other' => $subArray);
    		} else {
    			$return[] = array($idIndex => $subArray[$idIndex], $parentIndex => $parentID);
    		}

    		$return = array_merge($return, $returnSubSubArray);
    	}

    	return $return;
    }

    /**
     *  convert multidimensional array to single array
     *  only single index
     *
     * refference : https://stackoverflow.com/a/56260590/10351006
     * @param  array $array The multidimenional array
     * @return array ( single array )
     */
    public function nestedToSingle(array $array) {
    	$singleDimArray = [];

    	foreach ($array as $item) {
    		if (is_array($item)) {
    			$singleDimArray = array_merge($singleDimArray, $this->nestedToSingle($item));
    		} else {
    			$singleDimArray[] = $item;
    		}
    	}

    	return $singleDimArray;
    }

    /**
     * Convert a multi-dimensional array into a single-dimensional array.
     * @author Sean Cannon, LitmusBox.com | seanc@litmusbox.com
     *
     * @param  array   $array The multi-dimensional array.
     * @return array
     */
    public function array_flatten($array) {
    	if (!is_array($array)) {
    		return false;
    	}
    	$result = array();
    	foreach ($array as $key => $value) {
    		if (is_array($value)) {
    			$result = array_merge($result, $this->array_flatten($value));
    		} else {
    			$result = array_merge($result, array($key => $value));
    		}
    	}

    	return $result;
    }

    public function array_flatten2($arr, $out = array()) {
    	foreach ($arr as $item) {
    		if (is_array($item)) {
    			$out = array_merge($out, $this->array_flatten2($item));
    		} else {
    			$out[] = $item;
    		}
    	}

    	return $out;
    }

    public function array_flatten3($array, $prefix = '') {
    	$result = array();
    	foreach ($array as $key => $value) {
    		if (is_array($value)) {
    			$result = $result + $this->array_flatten3($value, $prefix . $key . '.');
    		} else {
    			$result[$prefix . $key] = $value;
    		}
    	}

    	return $result;
    }

    public function array_flatten4($arr) {
    	$it = new RecursiveIteratorIterator(new RecursiveArrayIterator($arr));

    	return iterator_to_array($it, true);
    }

    /**
     * convert multidimensional array to single array
     * reduce tree structure to single array
     *
     * @param  <type> $a    { array }
     * @param  array  $flat The flat
     * @return array  ( return to single array )
     */
    public function array_flatten5($a, $flat = []) {
    	$entry = [];
    	foreach ($a as $key => $el) {
    		if (is_array($el)) {
    			$flat = $this->array_flatten5($el, $flat);
    		} else {
    			$entry[$key] = $el;
    		}
    	}
    	if (!empty($entry)) {
    		$flat[] = $entry;
    	}

    	return $flat;
    }

    /**
     * search data on multiple dimension array
     *
     * @param  array  $dataList       The data list
     * @param  string $keyIndexSearch The key index search
     * @param  string $valueToFind    The value to find
     * @return array  ( return array by index result from searching )
     */
    public function arraySearch($dataList = array(), $keyIndexSearch, $valueToFind) {
        // refference : https://stackoverflow.com/a/24527099/10351006
        // search data on multiple dimension array
        // return only 1 array

    	$key = array_search($valueToFind, array_column($dataList, $keyIndexSearch));

    	return $dataList[$key];
    }

    public function arrayToColumn($arr = array(), $index = 'name', $value = 'value') {
        //convert list value to column

        /*
        @param $arr = Array()
        @param index like name
        @param value like value

         */

        return array_column($arr, $value, $index);
    }

    public function array_column_multi($array, $column, $multi = true, $index_remove = true) {
    	$types = array_unique(array_column($array, $column));

    	$return = [];
    	foreach ($types as $type) {
    		foreach ($array as $key => $value) {
    			if ($type === $value[$column]) {
    				if ($index_remove) {
    					unset($value[$column]);
    				}
    				if ($multi == false) {
    					$return[$type] = $value;
    				} else {
    					$return[$type][] = $value;
    				}
    				unset($array[$key]);
    			}
    		}
    	}

    	return $return;
    }

    public function duplicate_multiarray($dataArray, $opsi = 2) {
        // remove duplicate on array multi-dimesional
        // recommend use $opsi 2 if there had string value
    	if ($opsi == 1) {
    		array_unique($dataArray, SORT_REGULAR);
    	} elseif ($opsi == 2) {
    		return array_map("unserialize", array_unique(array_map("serialize", $dataArray)));
    	}
    }

    /*
    array sorting

    sorting array yg hanya bisa dilakukan secara langsung
    alias pemanggilan method function takan berfungsi
     */

    public function sortArray($data = array(), $opsi = 1) {
        /*
        only for single array
        sort() - sort arrays in ascending order
        rsort() - sort arrays in descending order
        asort() - sort associative arrays in ascending order, according to the value
        ksort() - sort associative arrays in ascending order, according to the key
        arsort() - sort associative arrays in descending order, according to the value
        krsort() - sort associative arrays in descending order, according to the key
         */

        switch ($opsi) {
        	case 1:
        	default:
        	return sort($data);
        	break;
        	case 2:
        	return rsort($data);
        	break;
        	case 3:
        	return asort($data);
        	break;
        	case 4:
        	return ksort($data);
        	break;
        	case 5:
        	return arsort($data);
        	break;
        	case 6:
        	return krsort($data);
        	break;
        }
    }

    public function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
		// reff : https://stackoverflow.com/a/2699153/10351006
    	$sort_col = array();
    	foreach ($arr as $key => $row) {
    		$sort_col[$key] = $row[$col];
    	}

    	array_multisort($sort_col, $dir, $arr);
    }

    public function sortArrayMulti($data = array(), $nama = 'total', $order = 'DESC') {
    	array_multisort(array_column($data, $nama), ($order == 'DESC' ? SORT_DESC : SORT_ASC), $data);
    }

    public function sortArrayMulti2($data = array()) {
        // gagal, harus secara langsung
    	function cmp($a, $b) {
    		if ($a['total'] == $b['total']) {
    			return 0;
    		}

    		return ($a['total'] < $b['total']) ? -1 : 1;
    	}
        // script pemanggilannya :
    	uasort($data, 'cmp');
    }

    public function SortByKeyValue($data, $sortKey, $sort_flags = SORT_ASC, $reindex = true) {
        // refference : https://stackoverflow.com/a/16563755/10351006

    	if (empty($data) or empty($sortKey)) {
    		return $data;
    	}

    	$ordered = array();
    	foreach ($data as $key => $value) {
    		$ordered[$value[$sortKey]] = $value;
    	}

    	ksort($ordered, $sort_flags);

    	if ($reindex) {
            // array_values() added for identical result with multisort*

    		return array_values($ordered);
    	} else {
    		return $ordered;
    	}
    }

    public function reindexArraybyValue($data, $keyToIndex) {
        // create by mochammad faisal
        // date create 20/04/2020 10:52

    	$new_data = array();
    	foreach ($data as $key => $value) {
    		$new_data[$value[$keyToIndex]] = $value;
    	}

    	return $new_data;
    }

    // get min max value array
    public function getMaxValueArray($dataArray, $index_of_column = '') {
        /*
         * @param index_of_column ex. nama
         * @param dataArray list of data array
         */

        if (!empty($index_of_column)) {
        	return max(array_column($dataArray, $index_of_column));
        } else {
        	return max($dataArray);
        }
    }

    public function getMinValueArray($dataArray, $index_of_column = '') {
        /*
         * @param index_of_column ex. nama
         * @param dataArray list of data array
         */

        if (!empty($index_of_column)) {
        	return min(array_column($dataArray, $index_of_column));
        } else {
        	return min($dataArray);
        }
    }

    // end of min max value array

    /*

    number formating

     */

    public function numberFormat($number, $desimal_digit = 0, $desimal_separator = ".", $ribuan_separator = ",") {
    	$decimals      = $desimal_digit;
    	$dec_point     = $desimal_separator;
    	$thousands_sep = $ribuan_separator;

        /*$init_config = (isset($this->init_config['number']) ? $this->init_config['number'] : array());

        if(!empty($init_config)){

        if(!empty($init_config['separator_ribuan'])){
        $thousands_sep = $this->separator_ribuan;
        }

    }*/

    return number_format($number, $decimals, $dec_point, $thousands_sep);
}

public function numberFormatRupiah($number, $desimal_digit = 0, $desimal_separator = ".", $ribuan_separator = ",") {
	$decimals      = $desimal_digit;
	$dec_point     = $desimal_separator;
	$thousands_sep = $ribuan_separator;

        /*$init_config = (isset($this->init_config['number']) ? $this->init_config['number'] : array());

        if(!empty($init_config)){

        if(!empty($init_config['separator_ribuan'])){
        $thousands_sep = $this->separator_ribuan;
        }

    }*/

    return "Rp. " . number_format($number, $decimals, $dec_point, $thousands_sep);
}

public function shortNumberFormat($num) {
        /*
        refference list of number :

        https://blog.prepscholar.com/what-comes-after-trillion
        https://www.mathsisfun.com/metric-numbers.html
         */

        // maks 100000000000000 = 100t

        if ($num > 1000) {
        	$x               = round($num);
        	$x_number_format = number_format($x);
        	$x_array         = explode(',', $x_number_format);
        	$x_parts         = array('k', 'M', 'B', 'T', 'P', 'E', 'Z', 'Y');
        	$x_count_parts   = count($x_array) - 1;
        	$x_display       = $x;
        	$x_display       = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        	$x_display .= $x_parts[$x_count_parts - 1];

        	return $x_display;
        }

        return $num;
    }

    public function penyebut($nilai) {
        // function pembantu terbilang
        // refference web : https://www.malasngoding.com/cara-mudah-membuat-fungsi-terbilang-dengan-php/
        // maks 100000000000000 = seratus trilyun

    	$nilai = abs($nilai);
    	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    	$temp  = "";
    	if ($nilai < 12) {
    		$temp = " " . $huruf[$nilai];
    	} elseif ($nilai < 20) {
    		$temp = $this->penyebut($nilai - 10) . " belas";
    	} elseif ($nilai < 100) {
    		$temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
    	} elseif ($nilai < 200) {
    		$temp = " seratus" . $this->penyebut($nilai - 100);
    	} elseif ($nilai < 1000) {
    		$temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
    	} elseif ($nilai < 2000) {
    		$temp = " seribu" . $this->penyebut($nilai - 1000);
    	} elseif ($nilai < 1000000) {
    		$temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
    	} elseif ($nilai < 1000000000) {
    		$temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
    	} elseif ($nilai < 1000000000000) {
    		$temp = $this->penyebut($nilai / 1000000000) . " milyar" . $this->penyebut(fmod($nilai, 1000000000));
    	} elseif ($nilai < 1000000000000000) {
    		$temp = $this->penyebut($nilai / 1000000000000) . " trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
    	}

    	return $temp;
    }

    public function penyebut2($nominal, $cent = 'POINT', $desimal = 2, $matauang = 'RUPIAH') {
        // reff : https://www.diskusiweb.com/discussion/comment/280669/#Comment_280669

    	$CENT = 0;
    	$POINT = 1;

    	$format = numfmt_create('id', NumberFormatter::SPELLOUT);

    	if ($cent != $POINT) {
    		$cent = trim(strtoupper($cent)) == 'POINT' ? $POINT : $CENT;
    	}

    	if ($cent == $CENT) {
    		$desimal = 2;
    	}

    	$nominal = round($nominal, $desimal);
    	$words   = '';

    	if ($cent == $CENT) {
    		$nominal = explode('.', $nominal);
    		if (isset($nominal[1]) && $nominal[1] < 10) {
    			$nominal[1] .= '0';
    		}

    		$words .= strtoupper(numfmt_format($format, $nominal[0])) . ' ' . $matauang;
    		$words .= isset($nominal[1]) ? ' ' . strtoupper(numfmt_format($format, $nominal[1])) . ' SEN' : '';
    	} else {
    		$words = str_replace('TITIK', 'KOMA', strtoupper(numfmt_format($format, $nominal)));
    	}

    	return $words;
    }

    public function penyebut_china($nilai) {
        // function pembantu terbilang
        // refference web : https://www.malasngoding.com/cara-mudah-membuat-fungsi-terbilang-dengan-php/
        // maks 100000000000000 = seratus trilyun

    	$nilai = abs($nilai);
    	$huruf = array("", "it", "Ji/No", "sa", "si", "go", "lak", "cit", "pek", "kau", "cap");
    	$temp  = "";
    	if ($nilai < 11) {
    		$temp = " " . $huruf[$nilai];
    	} elseif ($nilai < 20) {
    		$temp = $this->penyebut($nilai - 10) . " cap";
    	} elseif ($nilai < 100) {
    		$temp = $this->penyebut($nilai / 10) . " cap" . $this->penyebut($nilai % 10);
    	} elseif ($nilai < 200) {
    		$temp = " seratus" . $this->penyebut($nilai - 100);
    	} elseif ($nilai < 1000) {
    		$temp = $this->penyebut($nilai / 100) . " pek" . $this->penyebut($nilai % 100);
    	} elseif ($nilai < 2000) {
    		$temp = " seribu" . $this->penyebut($nilai - 1000);
    	} elseif ($nilai < 1000000) {
    		$temp = $this->penyebut($nilai / 1000) . " ceng" . $this->penyebut($nilai % 1000);
    	} elseif ($nilai < 1000000000) {
    		$temp = $this->penyebut($nilai / 1000000) . " tiao" . $this->penyebut($nilai % 1000000);
    	}

        //sampe juta

    	return $temp;
    }

    public function terbilang($nilai, $style = 4) {
        /*

        style :
        1 = SERATUS TRILYUN
        2 = seratus trilyun
        3 = Seratus Trilyun
        4 = Seratus trilyun
        */

        if ($nilai < 0) {
        	$hasil = "minus " . trim($this->penyebut($nilai));
        } else {
        	$hasil = trim($this->penyebut($nilai));
        }

        switch ($style) {
        	case 1:
        	$hasil = strtoupper($hasil);
        	break;
        	case 2:
        	$hasil = strtolower($hasil);
        	break;
        	case 3:
        	$hasil = ucwords($hasil);
        	break;
        	default:
        	$hasil = ucfirst($hasil);
        	break;
        }

        return $hasil;
    }

    /*
    roman function
     */

    public function conv_romawi($number) {
        /*
        refference simbol : https://en.wikipedia.org/wiki/List_of_Latin-script_letters
        refference roman value : https://en.wiktionary.org/wiki/Appendix:Roman_numerals

         */

        // maks 500000 = C̄C̄C̄C̄C̄
        $map         = array('C̄' => 100000, 'L̄' => 50000, 'X̅' => 10000, 'V̄' => 5000, 'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
        	foreach ($map as $roman => $int) {
        		if ($number >= $int) {
        			$number -= $int;
        			$returnValue .= $roman;
        			break;
        		}
        	}
        }

        return $returnValue;
    }

    public function deromanize(String $number) {
    	$numerals = array('C̄' => 100000, 'L̄' => 50000, 'X̅' => 10000, 'V̄' => 5000, 'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    	$number   = str_replace(" ", "", strtoupper($number));
    	$result   = 0;
    	foreach ($numerals as $key => $value) {
    		while (strpos($number, $key) === 0) {
    			$result += $value;
    			$number = substr($number, strlen($key));
    		}
    	}

    	return $result;
    }
    public function romanize($number) {
    	$result   = "";
    	$numerals = array('C̄' => 100000, 'L̄' => 50000, 'X̅' => 10000, 'V̄' => 5000, 'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    	foreach ($numerals as $key => $value) {
    		$result .= str_repeat($key, $number / $value);
    		$number %= $value;
    	}

    	return $result;
    }

    /*
    end of roman function
     */

    /*
    end of number formating
     */

    /* Notification */

    public function statusNotifikasi($stat) {
    	if ($stat == 1) {
    		return 'Pending';
    	} elseif ($stat == 2) {
    		return 'Verified';
    	} else {
    		return 'Un-Verified';
    	}
    }

    public function checklistStatusNotifikasi($stat) {
    	if ($stat == 1) {
    		return '<i class="fa fa-check text-green" aria-hidden="true"></i>';
    	} else {
    		return '<i class="fa fa-close text-red" aria-hidden="true"></i>';
    	}
    }

    /* End of Notification */

    public function color_name_to_hex($color_name) {
        // converts an html color name to a hex color value
        // if the input is not a color name, the original value is returned
        // http://wpCodeSnippets.info
        // reff : https://stackoverflow.com/a/5925612/10351006

        // standard 147 HTML color names

    	$colors = array(
    		'aliceblue'            => 'F0F8FF',
    		'antiquewhite'         => 'FAEBD7',
    		'aqua'                 => '00FFFF',
    		'aquamarine'           => '7FFFD4',
    		'azure'                => 'F0FFFF',
    		'beige'                => 'F5F5DC',
    		'bisque'               => 'FFE4C4',
    		'black'                => '000000',
    		'blanchedalmond '      => 'FFEBCD',
    		'blue'                 => '0000FF',
    		'blueviolet'           => '8A2BE2',
    		'brown'                => 'A52A2A',
    		'burlywood'            => 'DEB887',
    		'cadetblue'            => '5F9EA0',
    		'chartreuse'           => '7FFF00',
    		'chocolate'            => 'D2691E',
    		'coral'                => 'FF7F50',
    		'cornflowerblue'       => '6495ED',
    		'cornsilk'             => 'FFF8DC',
    		'crimson'              => 'DC143C',
    		'cyan'                 => '00FFFF',
    		'darkblue'             => '00008B',
    		'darkcyan'             => '008B8B',
    		'darkgoldenrod'        => 'B8860B',
    		'darkgray'             => 'A9A9A9',
    		'darkgreen'            => '006400',
    		'darkgrey'             => 'A9A9A9',
    		'darkkhaki'            => 'BDB76B',
    		'darkmagenta'          => '8B008B',
    		'darkolivegreen'       => '556B2F',
    		'darkorange'           => 'FF8C00',
    		'darkorchid'           => '9932CC',
    		'darkred'              => '8B0000',
    		'darksalmon'           => 'E9967A',
    		'darkseagreen'         => '8FBC8F',
    		'darkslateblue'        => '483D8B',
    		'darkslategray'        => '2F4F4F',
    		'darkslategrey'        => '2F4F4F',
    		'darkturquoise'        => '00CED1',
    		'darkviolet'           => '9400D3',
    		'deeppink'             => 'FF1493',
    		'deepskyblue'          => '00BFFF',
    		'dimgray'              => '696969',
    		'dimgrey'              => '696969',
    		'dodgerblue'           => '1E90FF',
    		'firebrick'            => 'B22222',
    		'floralwhite'          => 'FFFAF0',
    		'forestgreen'          => '228B22',
    		'fuchsia'              => 'FF00FF',
    		'gainsboro'            => 'DCDCDC',
    		'ghostwhite'           => 'F8F8FF',
    		'gold'                 => 'FFD700',
    		'goldenrod'            => 'DAA520',
    		'gray'                 => '808080',
    		'green'                => '008000',
    		'greenyellow'          => 'ADFF2F',
    		'grey'                 => '808080',
    		'honeydew'             => 'F0FFF0',
    		'hotpink'              => 'FF69B4',
    		'indianred'            => 'CD5C5C',
    		'indigo'               => '4B0082',
    		'ivory'                => 'FFFFF0',
    		'khaki'                => 'F0E68C',
    		'lavender'             => 'E6E6FA',
    		'lavenderblush'        => 'FFF0F5',
    		'lawngreen'            => '7CFC00',
    		'lemonchiffon'         => 'FFFACD',
    		'lightblue'            => 'ADD8E6',
    		'lightcoral'           => 'F08080',
    		'lightcyan'            => 'E0FFFF',
    		'lightgoldenrodyellow' => 'FAFAD2',
    		'lightgray'            => 'D3D3D3',
    		'lightgreen'           => '90EE90',
    		'lightgrey'            => 'D3D3D3',
    		'lightpink'            => 'FFB6C1',
    		'lightsalmon'          => 'FFA07A',
    		'lightseagreen'        => '20B2AA',
    		'lightskyblue'         => '87CEFA',
    		'lightslategray'       => '778899',
    		'lightslategrey'       => '778899',
    		'lightsteelblue'       => 'B0C4DE',
    		'lightyellow'          => 'FFFFE0',
    		'lime'                 => '00FF00',
    		'limegreen'            => '32CD32',
    		'linen'                => 'FAF0E6',
    		'magenta'              => 'FF00FF',
    		'maroon'               => '800000',
    		'mediumaquamarine'     => '66CDAA',
    		'mediumblue'           => '0000CD',
    		'mediumorchid'         => 'BA55D3',
    		'mediumpurple'         => '9370D0',
    		'mediumseagreen'       => '3CB371',
    		'mediumslateblue'      => '7B68EE',
    		'mediumspringgreen'    => '00FA9A',
    		'mediumturquoise'      => '48D1CC',
    		'mediumvioletred'      => 'C71585',
    		'midnightblue'         => '191970',
    		'mintcream'            => 'F5FFFA',
    		'mistyrose'            => 'FFE4E1',
    		'moccasin'             => 'FFE4B5',
    		'navajowhite'          => 'FFDEAD',
    		'navy'                 => '000080',
    		'oldlace'              => 'FDF5E6',
    		'olive'                => '808000',
    		'olivedrab'            => '6B8E23',
    		'orange'               => 'FFA500',
    		'orangered'            => 'FF4500',
    		'orchid'               => 'DA70D6',
    		'palegoldenrod'        => 'EEE8AA',
    		'palegreen'            => '98FB98',
    		'paleturquoise'        => 'AFEEEE',
    		'palevioletred'        => 'DB7093',
    		'papayawhip'           => 'FFEFD5',
    		'peachpuff'            => 'FFDAB9',
    		'peru'                 => 'CD853F',
    		'pink'                 => 'FFC0CB',
    		'plum'                 => 'DDA0DD',
    		'powderblue'           => 'B0E0E6',
    		'purple'               => '800080',
    		'red'                  => 'FF0000',
    		'rosybrown'            => 'BC8F8F',
    		'royalblue'            => '4169E1',
    		'saddlebrown'          => '8B4513',
    		'salmon'               => 'FA8072',
    		'sandybrown'           => 'F4A460',
    		'seagreen'             => '2E8B57',
    		'seashell'             => 'FFF5EE',
    		'sienna'               => 'A0522D',
    		'silver'               => 'C0C0C0',
    		'skyblue'              => '87CEEB',
    		'slateblue'            => '6A5ACD',
    		'slategray'            => '708090',
    		'slategrey'            => '708090',
    		'snow'                 => 'FFFAFA',
    		'springgreen'          => '00FF7F',
    		'steelblue'            => '4682B4',
    		'tan'                  => 'D2B48C',
    		'teal'                 => '008080',
    		'thistle'              => 'D8BFD8',
    		'tomato'               => 'FF6347',
    		'turquoise'            => '40E0D0',
    		'violet'               => 'EE82EE',
    		'wheat'                => 'F5DEB3',
    		'white'                => 'FFFFFF',
    		'whitesmoke'           => 'F5F5F5',
    		'yellow'               => 'FFFF00',
    		'yellowgreen'          => '9ACD32',
    	);

$color_name = strtolower($color_name);

if (isset($colors[$color_name])) {
            // return ('#' . $colors[$color_name]);
	return $colors[$color_name];
} else {
	return ($color_name);
}
}

public function gen_hmac($str, $secret = '', $algorithm = 'md5') {
        // $secret = salt

	$algorithmList = array('md2', 'md4', 'md5', 'sha1', 'sha224', 'sha256', 'sha384', 'sha512/224', 'sha512/256', 'sha512', 'sha3-224', 'sha3-256', 'sha3-384', 'sha3-512', 'ripemd128', 'ripemd160', 'ripemd256', 'ripemd320', 'whirlpool', 'tiger128,3', 'tiger160,3', 'tiger192,3', 'tiger128,4', 'tiger160,4', 'tiger192,4', 'snefru', 'snefru256', 'gost', 'gost-crypto', 'haval128,3', 'haval160,3', 'haval192,3', 'haval224,3', 'haval256,3', 'haval128,4', 'haval160,4', 'haval192,4', 'haval224,4', 'haval256,4', 'haval128,5', 'haval160,5', 'haval192,5', 'haval224,5', 'haval256,5');

	if (in_array($algorithm, $algorithmList)) {
		return hash_hmac($algorithm, $str, $secret);
	} else {
		return false;
	}
}

    // end of class
}
