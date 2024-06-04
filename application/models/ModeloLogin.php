<?php

class ModeloLogin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function iniciarSesion($rut) {
        $querySelect = $this->db->query("SELECT dt.pago FROM usuario u INNER JOIN datos_local dt ON u.id_datos_local = dt.id_datos_local WHERE u.rut = ? AND dt.pago = 't'", array($rut));
    
        if ($querySelect->num_rows() > 0) { 
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('rut', $rut);
            $this->db->where('id_estado', 1);
    
            $query = $this->db->get();
    
            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return false;
            }
        } else {
            return '1';

        }
    }
    
    public function verificarContrasena($password, $hash) {
        return password_verify($password, $hash);
    }

    public function guardarToken($id_usuario, $token) {
        $data = array('token' => $token);
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->update('usuario', $data);
    }

    public function verificarToken($token) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('token', $token);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function verificarPagoDatoLocal($id_usuario) {
        $query = $this->db->query("SELECT dt.pago FROM usuario u INNER JOIN datos_local dt ON u.id_datos_local = dt.id_datos_local WHERE u.id_usuario = ? AND dt.pago = 't'", array($id_usuario));
        return $query->num_rows() > 0;
    }
    
}
