<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorPromocion extends CI_Controller {

    public function index() {
        if ($this->session->userdata('id_usuario')) {
            $id_usuario = $this->session->userdata('id_usuario');
            $this->load->model('ModeloImagenes');
            $this->load->model('ModeloPromocion');
            $data['img_logo'] = $this->ModeloImagenes->obtenerLogo($id_usuario);
            $data['configuraciones'] = $this->ModeloPromocion->selectConfiguracionPromocion($id_usuario);
            $data['promociones'] = $this->ModeloPromocion->obtenerPromocion();

            // Verificar si el usuario tiene el pago de datos local activo
            $pago_dato_local = $this->ModeloPromocion->verificarPagoDatoLocal($id_usuario);
            if (!$pago_dato_local) {
                $data['error'] = 'El acceso ha sido denegado debido a que usted no a cancelado, moroso.';
                $this->load->view('Login.php', $data);
                return;
            }

            // Continuar con la lógica de la vista dependiendo de la configuración
            if ($data['configuraciones']->id_destacado == 2) {
                $this->load->view('Promocion/VistaPromocion', $data);
            } else {
                $this->load->view('Promocion/VistaPromocionPrecioDestacado', $data);
            }
        } else {
            redirect('ControladorLogin');
        }
    }
}
