<?php
  
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  #validation error control
  if ( ! function_exists('my_validation_errors')){
    function my_validation_errors($errors) {
      #Message for error alerts
      $exitAlert = '';

      if ($errors) {
        $exitAlert = '<div class="alert alert-error">';
        $exitAlert = $exitAlert.'<button type="button" class="close" data-dismiss="alert"> × </button>';
        $exitAlert = $exitAlert.'<h4> Mensajes Validacion </h4>';
        $exitAlert = $exitAlert.'<small>'.$errors.'</small>';
        $exitAlert = $exitAlert.'</div>';
      }
      return $exitAlert;
    }
  }

  if ( ! function_exists('my_menu_ppal')) {

    function my_menu_ppal() {
      $options = '<li>'.anchor('home/index', 'Inicio').'</li>';
      $options = $options.'<li>'.anchor('home/aboutUs', 'Acerca De').'</li>';

      if (get_instance()->session->userdata('user')) {
        $options = $options.'<li>'.anchor('home/change_password_form', 'Cambiar contraseña').'</li>';
        $options = $options.'<li>'.anchor('home/closeSession', 'Salir').'</li>';
      }
      else {
        $options = $options.'<li>'.anchor('home/registerForm', 'Ingreso').'</li>';
      }
      return $options;
    }
  }

?>