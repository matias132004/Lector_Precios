<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorMenu extends CI_Controller {

    public function index() {
        if ($this->session->userdata('id_usuario')) {
            $this->load->model('ModeloEscanear');
            $id_usuario = $this->session->userdata('id_usuario');
            $data['configuracion'] = $this->ModeloEscanear->selectConfiguracion($id_usuario);
            $this->load->view('Menu/Menu', $data);
        } else {
            redirect('ControladorLogin');
        }
    }

    public  function error() {
        $this->load->view('Escaner/VistaError');
    }

}
