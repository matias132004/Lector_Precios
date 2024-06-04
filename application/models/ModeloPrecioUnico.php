<?php

class ModeloPrecioUnico extends CI_Model {

    public function selectPrecio($cbarra) {
        try {
            // Tu consulta SQL aquí
            $query = "SELECT p.id_producto, p.nombre_producto,p.descripcion, p.descripcionvisible,p.total, p.cbarra,p.precio_old, um.nombre_corto
FROM producto p
JOIN umedida um ON p.id_umedida = um.id_umedida
WHERE p.cbarra = ?
and p.id_estado = 1
";

            return $this->db->query($query, array($cbarra));
        } catch (Exception $e) {
            // Manejar la excepción
            log_message('error', 'Error en la consulta: ' . $e->getMessage());
            return false;
        }
    }
    public function selectPrecioVolumen($cbarra) {
            $querySelect = $this->db->query("select pv.* from precio_volumen pv inner join producto p on pv.id_producto = p.id_producto where cbarra = '$cbarra'");
         return $querySelect->result_array();
    }

    public function insertEscaneado($datos_escaneados) {

        $this->db->select_max('id_escaneados');
        $query = $this->db->get('escaneados');
        $last_id = $query->row()->id_escaneados;
    
        $new_id = $last_id + 1;
    
        $datos_escaneados['id_escaneados'] = $new_id;
    
        $datos_escaneados['fecha_escaneado'] = date('Y-m-d');
    
        $this->db->insert('escaneados', $datos_escaneados);
    }
    public function verificarPagoDatoLocal($id_usuario) {
        $query = $this->db->query("SELECT dt.pago FROM usuario u INNER JOIN datos_local dt ON u.id_datos_local = dt.id_datos_local WHERE u.id_usuario = ? AND dt.pago = 't'", array($id_usuario));
        return $query->num_rows() > 0;
    }
    

}


