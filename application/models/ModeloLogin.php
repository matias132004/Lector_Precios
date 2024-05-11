<?php
class ModeloLogin extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
public function iniciarSesion($rut) {
    $query = $this->db->get_where('usuario', array('rut' => $rut, 'id_estado' => 1));
    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false; 
    }
}


    public function verificarContrasena($password, $hash) {
        return password_verify($password, $hash);
    }
}
?>
