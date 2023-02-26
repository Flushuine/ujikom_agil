<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_prodi_model extends CI_Model
{

    public $table = 'm_prodi';
    public $id = 'kd_prodi';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($p = NULL)
    {
        $this->db->like('kd_prodi', $p);
        $this->db->or_like('kd_jenis_prodi', $p);
        $this->db->or_like('nm_prodi', $p);
        $this->db->or_like('status_prodi', $p);
        $this->db->or_like('email_prodi', $p);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $p = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kd_prodi', $p);
        $this->db->or_like('kd_jenis_prodi', $p);
        $this->db->or_like('nm_prodi', $p);
        $this->db->or_like('status_prodi', $p);
        $this->db->or_like('email_prodi', $p);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
