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
                

                if ($data['configuraciones']->id_destacado == 2) {

                $this->load->view('Promocion/VistaPromocion', $data);
                }else{
                    $this->load->view('Promocion/VistaPromocionPrecioDestacado', $data);
                }
    


            } else {
                redirect('ControladorLogin');
            }
        }
    }
    

