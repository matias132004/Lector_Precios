<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorEscanear extends CI_Controller {

    public function index() {
        if ($this->session->userdata('id_usuario')) {
            $id_usuario = $this->session->userdata('id_usuario');

            $this->load->model('ModeloImagenes');
            $this->load->model('ModeloEscanear');

            // Verificar si el usuario tiene el pago de datos local activo
            $pago_dato_local = $this->ModeloEscanear->verificarPagoDatoLocal($id_usuario);
            if (!$pago_dato_local) {
                $data['error'] = 'El acceso ha sido denegado debido a que el pago del dato local no está activo.';
                $this->load->view('Login.php', $data);
                return;
            }

            $data['datosLocal'] = $this->ModeloEscanear->selectDatosLocal($id_usuario);
            $data['configuracion'] = $this->ModeloEscanear->selectConfiguracion($id_usuario);
            $data['imagenes'] = $this->ModeloImagenes->obtenerImagenes($id_usuario);
            $data['img_logo'] = $this->ModeloImagenes->obtenerLogo($id_usuario);
            
            $this->load->view('static/Header', $data);
            $this->load->view('Escaner/Vista_Escanear', $data);
            $this->load->view('static/Footer');
        } else {
            redirect('ControladorLogin');
        }
    }

    public function error() {
        if ($this->session->userdata('id_usuario')) {
            $this->load->view('Escaner/VistaError');
        } else {
            redirect('ControladorLogin');
        }
    }
}
