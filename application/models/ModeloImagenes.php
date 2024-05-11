<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloImagenes extends CI_Model {

    public function obtenerImagenes($id_usuario) {

        $query = $this->db->query("SELECT nombre, image_data 
                               FROM images 
                               WHERE tipo_img_id = 1 
                               AND id_datos_local = (SELECT id_datos_local 
                                                     FROM usuario 
                                                     WHERE id_usuario = '$id_usuario')");


        return $query->result();
    }

 public function obtenerLogo($id_usuario) {
        $query = $this->db->query("SELECT nombre, image_data 
                               FROM images 
                               WHERE tipo_img_id = 2 
                               AND id_datos_local = (SELECT id_datos_local 
                                                     FROM usuario 
                                                     WHERE id_usuario = '$id_usuario')");

        return $query->result();
    }

}
