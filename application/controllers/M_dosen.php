<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dosen extends My_Controller
{
    protected $access = array('Admin', 'Owneer');

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dosen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $m_dosen = $this->M_dosen_model->get_all();

        $title = array(
            'title' => 'm_dosen',
        );

        $data = array(
            'm_dosen_data' => $m_dosen,
        );
        $this->load->view('cover/header', $title);
        $this->load->view('m_dosen/m_dosen_list', $data);
        $this->load->view('cover/footer');
    }

    public function read($no_urut_dosen)
    {
        $row = $this->M_dosen_model->get_by_id($no_urut_dosen);
        if ($row) {
            $data = array(
                'no_urut_dosen' => $row->no_urut_dosen,
                'nm_dosen' => $row->nm_dosen,
                'nidn_dosen' => $row->nidn_dosen,
                'jns_klmn_dosen' => $row->jns_klmn_dosen,
                'kd_jabatan_dosen' => $row->kd_jabatan_dosen,
                'status_dosen' => $row->status_dosen,
            );

            $title = array(
                'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('m_dosen/m_dosen_read', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_dosen'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_dosen/create_action'),
            'no_urut_dosen' => set_value('no_urut_dosen'),
            'nm_dosen' => set_value('nm_dosen'),
            'nidn_dosen' => set_value('nidn_dosen'),
            'jns_klmn_dosen' => set_value('jns_klmn_dosen'),
            'kd_jabatan_dosen' => set_value('kd_jabatan_dosen'),
            'status_dosen' => set_value('status_dosen'),
        );
        $title = array(
            'title' => 'Detail',
        );
        $this->load->view('cover/header', $title);
        $this->load->view('m_dosen/m_dosen_form', $data);
        $this->load->view('cover/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nm_dosen' => $this->input->post('nm_dosen', TRUE),
                'nidn_dosen' => $this->input->post('nidn_dosen', TRUE),
                'jns_klmn_dosen' => $this->input->post('jns_klmn_dosen', TRUE),
                'kd_jabatan_dosen' => $this->input->post('kd_jabatan_dosen', TRUE),
                'status_dosen' => $this->input->post('status_dosen', TRUE),
            );

            $this->M_dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_dosen'));
        }
    }

    public function update($no_urut_dosen)
    {
        $row = $this->M_dosen_model->get_by_id($no_urut_dosen);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_dosen/create_action'),
                'no_urut_dosen' => set_value('no_urut_dosen', $row->no_urut_dosen),
                'nm_dosen' => set_value('nm_dosen', $row->nm_dosen),
                'nidn_dosen' => set_value('nidn_dosen', $row->nidn_dosen),
                'jns_klmn_dosen' => set_value('jns_klmn_dosen', $row->jns_klmn_dosen),
                'kd_jabatan_dosen' => set_value('kd_jabatan_dosen', $row->kd_jabatan_dosen),
                'status_dosen' => set_value('status_dosen', $row->status_dosen),
            );

            $title = array(
                'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('m_dosen/m_dosen_form', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_dosen'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_urut_dosen', TRUE));
        } else {
            $data = array(
                'nm_dosen' => $this->input->post('nm_dosen', TRUE),
                'nidn_dosen' => $this->input->post('nidn_dosen', TRUE),
                'jns_klmn_dosen' => $this->input->post('jns_klmn_dosen', TRUE),
                'kd_jabatan_dosen' => $this->input->post('kd_jabatan_dosen', TRUE),
                'status_dosen' => $this->input->post('status_dosen', TRUE),
            );

            $this->M_dosen_model->update($this->input->post('no_urut_dosen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_dosen'));
        }
    }

    public function delete($no_urut_dosen)
    {
        $row = $this->M_dosen_model->get_by_id($no_urut_dosen);

        if ($row) {
            $this->M_dosen_model->delete($no_urut_dosen);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_dosen'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nm_dosen', 'nm_dosen', 'trim|required');
        $this->form_validation->set_rules('nidn_dosen', 'nidn_dosen', 'trim|required');
        $this->form_validation->set_rules('jns_klmn_dosen', 'jns_klmn_dosen', 'trim|required');
        $this->form_validation->set_rules('kd_jabatan_dosen', 'kd_jabatan_dosen', 'trim|required');
        $this->form_validation->set_rules('status_dosen', 'status_dosen', 'trim|required');

        $this->form_validation->set_rules('no_urut_dosen', 'no_urut_dosen', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_dosen.xls";
        $judul = "m_dosen";
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

        foreach ($this->M_dosen_model->get_all() as $data) {
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
        header("Content-Disposition: attachment;Filename=m_dosen.doc");

        $data = array(
            'm_dosen_data' => $this->M_dosen_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_dosen/m_dosen_doc', $data);
    }
}
