<?php

    class Login extends CI_Controller {

        function index()
        {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            //$this->form_validation->set_rules('username', 'Username', 'required');
            //$this->form_validation->set_rules('password', 'Password', 'required');
            //$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
            //$this->form_validation->set_rules('email', 'Email', 'required');
            
            $this->load->view('login/login');

            //if ($this->form_validation->run() == FALSE)
            //{
            //    $this->load->view('login/login');
            //}
            //else
            //{
            //    $this->load->view('login/login');
            //}
        }
    }
?>
