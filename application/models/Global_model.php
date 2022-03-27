<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Global_model extends CI_Model {

    function _construct() {
        parent::_construct();
    }

    function insert($table_name, $data) {
        
        $this->db->insert($table_name, $data);
        $id = $this->db->insert_id();
        
        return $id;
    }

    function get_data_list($table_name, $where = array(), $like = array(), $order_by = array(), $select = '*', $limit = 0, $like_or=array()) {
        $this->db->select($select);
        foreach ($like as $key => $value) {
            $this->db->like($key, $value);
        }

        foreach ($like_or as $key => $value) {
            $this->db->or_like($key, $value);
        }

        if (isset($where) && is_array($where)) {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if (isset($order_by) && is_array($order_by)) {
            foreach ($order_by as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }

        if ($limit != 0) {
            $this->db->limit($limit);
        }

        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    function get_selected_record($table_name, $select = "*", $where = array(), $order_by = '') {

        $this->db->select($select);

        if (count($where) > 0) {
            $this->db->where($where);
        }
        if ($order_by != '') {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get($table_name);

        return $query->row_array();
    }

    function update($table_name, $data, $id = 0, $where = array()) {
        if ($id > 0) {
            $this->db->where('id =', $id);
        }
        if (count($where) > 0) {
            $this->db->where($where);
        }

        return $this->db->update($table_name, $data);
    }

}
