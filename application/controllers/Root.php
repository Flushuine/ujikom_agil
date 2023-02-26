<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Root extends My_Controller
{
     protected $access = array('Admin', 'Owneer');

    function __construct()
    {
        parent::__construct();
        $this->load->model('Root_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $root = $this->Root_model->get_all();

        $title = array(
            'title' => 'root',
        );

        $data = array(
            'root_data' => $root,
        );
        $this->load->view('cover/header', $title);
        $this->load->view('root/root_list', $data);
        $this->load->view('cover/footer');
    }

    public function read($id) 
    {
        $row = $this->Root_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'password' => $row->password,
		'role' => $row->role,
	    );

            $title = array(
            'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('root/root_read', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('root'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('root/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'role' => set_value('role'),
	);
         $title = array(
            'title' => 'Detail',
            );
        $this->load->view('cover/header', $title);
        $this->load->view('root/root_form', $data);
        $this->load->view('cover/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => sha1($this->input->post('password',TRUE)),
		'role' => $this->input->post('role',TRUE),
	    );
        
            $this->Root_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('root'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Root_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('root/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'role' => set_value('role', $row->role),
	    );
            
            $title = array(
            'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('root/root_form', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('root'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => sha1($this->input->post('password',TRUE)),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->Root_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('root'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Root_model->get_by_id($id);

        if ($row) {
            $this->Root_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('root'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('root'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "root.xls";
        $judul = "root";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Role");

	foreach ($this->Root_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->role);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=root.doc");

        $data = array(
            'root_data' => $this->Root_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('root/root_doc',$data);
    }

}

