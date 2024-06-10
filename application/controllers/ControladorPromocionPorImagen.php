<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorPromocionPorImagen extends CI_Controller {

    public function index() {
        if ($this->session->userdata('id_usuario')) {
            $id_usuario = $this->session->userdata('id_usuario');

            $this->load->model('ModeloPromocionPorImagen');
            $data['configuraciones'] = $this->ModeloPromocionPorImagen->selectConfiguracionPromocion($id_usuario);
            $data['promociones'] = $this->ModeloPromocionPorImagen->obtenerPromocionPorImagen();

            // Verificar si el usuario tiene el pago de datos local activo
            $pago_dato_local = $this->ModeloPromocionPorImagen->verificarPagoDatoLocal($id_usuario);
            if (!$pago_dato_local) {
                $data['error'] = 'El acceso ha sido denegado debido a que usted no a cancelado, moroso.';
                $this->load->view('Login.php', $data);
                return;
            }
                $this->load->view('Promocion/VistaPromocionPorImagen', $data);
           
        } else {
            redirect('ControladorLogin');
        }
    }
}
