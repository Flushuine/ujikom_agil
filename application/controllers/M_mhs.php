<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_mhs extends My_Controller
{
    protected $access = array('Admin', 'Owneer');

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mhs_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $m_mhs = $this->M_mhs_model->get_all();

        $title = array(
            'title' => 'm_mhs',
        );

        $data = array(
            'm_mhs_data' => $m_mhs,
        );
        $this->load->view('cover/header', $title);
        $this->load->view('m_mhs/m_mhs_list', $data);
        $this->load->view('cover/footer');
    }

    public function read($id)
    {
        $row = $this->M_mhs_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
            );
 
            $title = array(
                'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('m_mhs/m_mhs_read', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_mhs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_mhs/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'alamat' => set_value('alamat'),
        );
        $title = array(
            'title' => 'Detail',
        );
        $this->load->view('cover/header', $title);
        $this->load->view('m_mhs/m_mhs_form', $data);
        $this->load->view('cover/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );

            $this->M_mhs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_mhs'));
        }
    }

    public function update($id)
    {
        $row = $this->M_mhs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_mhs/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'alamat' => set_value('alamat', $row->alamat),
            );

            $title = array(
                'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('m_mhs/m_mhs_form', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_mhs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );

            $this->M_mhs_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_mhs'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_mhs_model->get_by_id($id);

        if ($row) {
            $this->M_mhs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_mhs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_mhs'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_mhs.xls";
        $judul = "m_mhs";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");

        foreach ($this->M_mhs_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_mhs.doc");

        $data = array(
            'm_mhs_data' => $this->M_mhs_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_mhs/m_mhs_doc', $data);
    }
}
