<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {

        public function __construct(){
            parent::__construct();
            #change form validation error
            $this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
            $this->form_validation->set_message('login_ok', 'Usuario o clave incorrectos');
            $this->form_validation->set_message('matches', '%s no coincide con %s');
            $this->form_validation->set_message('change_ok', 'No se puede realizar el cambio de clave');
             
            #libraries
            $this->load->library('UserLibrary');
	}

        public function index() {
            #$this->load->view('home/index');
            $data['content'] ='home/index';
            $data['title'] = 'Inicio';
            $this->load->view('template',$data);
        }
        
        public function aboutUs() {
            #$this->load->view('home/aboutUs');
            $this->session->set_userdata('user', 'Daniel de Miguel');
            $data['content'] ='home/aboutUs';
            $data['title'] = 'Sobre nosotros';
            $this->load->view('template',$data);
        }

        public function accessDenied() {
            $data['content'] = 'home/accessDenied';
            $data['title'] = 'Acceso denegado';
            $this->load->view('template', $data);
        }

        public function closeSession() {
            $this->session->sess_destroy();
            redirect('home/index');
        }

        
        #register functions
        
        public function registerForm() {
            $data['content'] = 'home/registerForm';
            $data['title'] = 'Ingreso';
            $this->load->view('template', $data);
        }

        public function userRegister(){
            $login = $this->input->post('login');
            $password = $this->input->post('password');

            $this->form_validation->set_rules('login', 'Usuario', 'required|callback_login_ok');
            $this->form_validation->set_rules('password', 'Password', 'required');
            #$this->userlibrary->set_rules_userRegister();

            if($this->form_validation->run() == FALSE) {
                $this->registerForm();
            } else {
                $this->session->set_userdata('user', 'Daniel de Miguel');
                redirect('home/index');
            }
        }
        
        public function login_ok() {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            return $this->userlibrary->login($login, md5($password));
        }
        
        public function change_password_form() {
            $data['content'] = 'home/change_password_form';
            $data['title'] = 'Cambiar Contraseña';
            $this->load->view('template', $data);
        }
        
        public function validate_password() {
            $this->form_validation->set_rules('current_password', 'Clave Actual', 'required|callback_change_ok');
            $this->form_validation->set_rules('new_password', 'Clave Nueva', 'required|matches[rewrite_password]');
            $this->form_validation->set_rules('rewrite_password', 'Repita Nueva', 'required');
            
            if($this->form_validation->run() == FALSE) {
                $this->change_password_form();
            } else {
                redirect('home/index');
            }

        }
        
        public function change_ok() {
            $current = $this->input->post('current_password');
            $new = $this->input->post('new_password');
            return $this->userlibrary->change_password(md5($current), md5($new));
        }
        
    }

?>