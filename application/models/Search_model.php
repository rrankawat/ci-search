<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

    public function fetch($query) {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        if($query != '') {
            $this->db->like('CustomerName', $query);
            $this->db->or_like('Address', $query);
            $this->db->or_like('City', $query);
            $this->db->or_like('PostalCode', $query);
            $this->db->or_like('Country', $query);
        }
        $this->db->order_by('CustomerID', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function find($query) {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        if($query != '') {
            $this->db->where_in('CustomerName', $query);
            $this->db->or_where_in('Address', $query);
            $this->db->or_where_in('City', $query);
            $this->db->or_where_in('PostalCode', $query);
            $this->db->or_where_in('Country', $query);
        }
        $this->db->order_by('CustomerID', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}
