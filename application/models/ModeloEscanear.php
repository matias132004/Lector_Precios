<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloEscanear extends CI_Model {

    public function selectDatosLocal($id_usuario) {
        $querySelect = $this->db->query("SELECT datos_local.* 
            FROM datos_local INNER JOIN usuario
            ON datos_local.id_datos_local = usuario.id_datos_local 
            WHERE usuario.id_usuario ='$id_usuario'");
        return $querySelect->row_array();
    }
    
public function selectConfiguracion($id_usuario) {
    $querySelect = $this->db->query("SELECT configuraciones.* 
        FROM configuraciones 
        INNER JOIN usuario ON usuario.id_datos_local = configuraciones.id_datos_local
        WHERE usuario.id_usuario = '$id_usuario'");
    return $querySelect->row_array();
}
public function verificarPagoDatoLocal($id_usuario) {
    $query = $this->db->query("SELECT dt.pago FROM usuario u INNER JOIN datos_local dt ON u.id_datos_local = dt.id_datos_local WHERE u.id_usuario = ? AND dt.pago = 't'", array($id_usuario));
    return $query->num_rows() > 0;
}

}
