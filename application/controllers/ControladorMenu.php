<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorMenu extends CI_Controller {

    public function index() {
        if ($this->session->userdata('id_usuario')) {
            $id_usuario = $this->session->userdata('id_usuario');
            $this->load->model('ModeloEscanear');

            // Verificar si el usuario tiene el pago de datos local activo
            $pago_dato_local = $this->ModeloEscanear->verificarPagoDatoLocal($id_usuario);
            if (!$pago_dato_local) {
                $data['error'] = 'El acceso ha sido denegado debido a que usted no a cancelado, moroso.';
                $this->load->view('Login.php', $data);
                return;
            }

            $data['configuracion'] = $this->ModeloEscanear->selectConfiguracion($id_usuario);
            $this->load->view('Menu/Menu', $data);
        } else {
            redirect('ControladorLogin');
        }
    }

    public function error() {
        $this->load->view('Escaner/VistaError');
    }

}
