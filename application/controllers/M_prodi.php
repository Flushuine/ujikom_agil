<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_prodi extends My_Controller
{
    protected $access = array('Admin', 'Owneer');

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_prodi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $m_prodi = $this->M_prodi_model->get_all();

        $title = array(
            'title' => 'm_prodi',
        );

        $data = array(
            'm_prodi_data' => $m_prodi,
        );
        $this->load->view('cover/header', $title);
        $this->load->view('m_prodi/m_prodi_list', $data);
        $this->load->view('cover/footer');
    }

    public function read($kd_prodi)
    {
        $row = $this->M_prodi_model->get_by_id($kd_prodi);
        if ($row) {
            $data = array(
                'kd_prodi' => $row->kd_prodi,
                'kd_jenis_prodi' => $row->kd_jenis_prodi,
                'nm_prodi' => $row->nm_prodi,
                'status_prodi' => $row->status_prodi,
                'email_prodi' => $row->email_prodi,
            );

            $title = array(
                'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('m_prodi/m_prodi_read', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_prodi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_prodi/create_action'),
            'kd_prodi' => set_value('kd_prodi'),
            'kd_jenis_prodi' => set_value('kd_jenis_prodi'),
            'nm_prodi' => set_value('nm_prodi'),
            'status_prodi' => set_value('status_prodi'),
            'email_prodi' => set_value('email_prodi'),
        );
        $title = array(
            'title' => 'Detail',
        );
        $this->load->view('cover/header', $title);
        $this->load->view('m_prodi/m_prodi_form', $data);
        $this->load->view('cover/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kd_prodi' => $this->input->post('kd_prodi', TRUE),
                'kd_jenis_prodi' => $this->input->post('kd_jenis_prodi', TRUE),
                'nm_prodi' => $this->input->post('nm_prodi', TRUE),
                'status_prodi' => $this->input->post('status_prodi', TRUE),
                'email_prodi' => $this->input->post('email_prodi', TRUE),
            );

            $this->M_prodi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_prodi'));
        }
    }

    public function update($kd_prodi)
    {
        $row = $this->M_prodi_model->get_by_id($kd_prodi);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_prodi/update_action'),
                'kd_prodi' => set_value('kd_prodi', $row->kd_prodi),
                'kd_jenis_prodi' => set_value('kd_jenis_prodi', $row->kd_jenis_prodi),
                'nm_prodi' => set_value('nm_prodi', $row->nm_prodi),
                'status_prodi' => set_value('status_prodi', $row->status_prodi),
                'email_prodi' => set_value('email_prodi', $row->email_prodi),
            );

            $title = array(
                'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('m_prodi/m_prodi_form', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_prodi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_prodi', TRUE));
        } else {
            $data = array(
                'kd_jenis_prodi' => $this->input->post('kd_jenis_prodi', TRUE),
                'nm_prodi' => $this->input->post('nm_prodi', TRUE),
                'status_prodi' => $this->input->post('status_prodi', TRUE),
                'email_prodi' => $this->input->post('email_prodi', TRUE),
            );

            $this->M_prodi_model->update($this->input->post('kd_prodi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_prodi'));
        }
    }

    public function delete($kd_prodi)
    {
        $row = $this->M_prodi_model->get_by_id($kd_prodi);

        if ($row) {
            $this->M_prodi_model->delete($kd_prodi);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_prodi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_prodi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kd_jenis_prodi', 'kd_jenis_prodi', 'trim|required');
        $this->form_validation->set_rules('nm_prodi', 'nm_prodi', 'trim|required');
        $this->form_validation->set_rules('status_prodi', 'status_prodi', 'trim|required');
        $this->form_validation->set_rules('email_prodi', 'email_prodi', 'trim|required');

        $this->form_validation->set_rules('kd_prodi', 'kd_prodi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_prodi.xls";
        $judul = "m_prodi";
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
        xlsWriteLabel($tablehead, $kolomhead++, "kd_jenis_prodi");
        xlsWriteLabel($tablehead, $kolomhead++, "nm_prodi");
        xlsWriteLabel($tablehead, $kolomhead++, "status_prodi");
        xlsWriteLabel($tablehead, $kolomhead++, "email_prodi");

        foreach ($this->M_prodi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kd_jenis_prodi);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_prodi);
            xlsWriteLabel($tablebody, $kolombody++, $data->status_prodi);
            xlsWriteLabel($tablebody, $kolombody++, $data->email_prodi);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_prodi.doc");

        $data = array(
            'm_prodi_data' => $this->M_prodi_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_prodi/m_prodi_doc', $data);
    }
}
