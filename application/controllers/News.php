<?php
/***************************************************************************************************
 * Copyright (c) 2020. by Codepeople India
 * This project is developed and maintained by Codepeople India.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Codepeople India
 **************************************************************************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
    /**
     * Check Valid Login or display login page.
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->login->check_session() == false) {
            redirect(site_url('site/admin'));
        }
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title']      = 'Dashboard';
        $data['breadcrumb'] = 'dashboard';
        $this->load->view('admin/base', $data);
    }

    public function add_news()
    {   
        
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run() == false) 
        {
            $data['title']      = 'Update News';
            $data['breadcrumb'] = 'Update News';
            $data['layout']     = 'news/create_news.php';
            $this->load->view('admin/base', $data);
        } else {
            $description        = $this->input->post('description');
        
            $data = array(
            'description'       => $description,
            );
            $this->db->where('id',1)->update('news', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Update successfully.</div>');
            redirect('news/add_news');
        }
    }
}
