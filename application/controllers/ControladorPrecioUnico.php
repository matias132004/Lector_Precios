<?php

class ControladorPrecioUnico extends CI_Controller {

    public function index() {
        if ($this->session->userdata('id_usuario')) {
            $id_usuario = $this->session->userdata('id_usuario');

            $cbarra = $this->input->post('cbarra');
            $this->load->model('ModeloPrecioUnico');
            $this->load->model('ModeloEscanear');
            $this->load->model('ModeloImagenes');

            // Obtener precios
            $precios = $this->ModeloPrecioUnico->selectPrecio($cbarra)->result();
            if (empty($precios)) {
                redirect('ControladorEscanear/error');
                return;
            }
            $configuracion = $this->ModeloEscanear->selectConfiguracion($id_usuario);
            $datosLocal = $this->ModeloEscanear->selectDatosLocal($id_usuario);
            $data['imagenes'] = $this->ModeloImagenes->obtenerImagenes($id_usuario);
            $data['img_logo'] = $this->ModeloImagenes->obtenerLogo($id_usuario);
            $data['precio_volumen'] = $this->ModeloPrecioUnico->selectPrecioVolumen($cbarra);
            
            $productos_agrupados = [];
            foreach ($precios as $precio) {
                $id_producto = $precio->id_producto;
                if (!isset($productos_agrupados[$id_producto])) {
                    $productos_agrupados[$id_producto] = [];
                }
                $productos_agrupados[$id_producto][] = $precio;
    

                $datos_escaneados = array(
                    'id_producto' => $precio->id_producto,
                    'nombre_producto' => $precio->nombre_producto,
                    'cbarra' => $precio->cbarra
                );
                $this->ModeloPrecioUnico->insertEscaneado($datos_escaneados);
            }
    
            $data['productos_agrupados'] = $productos_agrupados;
            $data['configuracion'] = $configuracion;
            $data['datosLocal'] = $datosLocal;

            $this->load->view('static/Header', $data);
            $this->load->view('Escaner/VistaPrecioUnico', $data);
        } else {
            redirect('ControladorLogin');
        }
    }

    
}

?>
