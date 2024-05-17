<?php

class ModeloPrecioUnico extends CI_Model {

    public function selectPrecio($cbarra) {
        try {
            // Tu consulta SQL aquí
            $query = "SELECT p.id_producto, p.nombre_producto,p.descripcion, p.descripcionvisible,p.total, p.cbarra,p.precio_old, um.nombre_corto
FROM producto p
JOIN umedida um ON p.id_umedida = um.id_umedida
WHERE p.cbarra = ?;
";

            return $this->db->query($query, array($cbarra));
        } catch (Exception $e) {
            // Manejar la excepción
            log_message('error', 'Error en la consulta: ' . $e->getMessage());
            return false;
        }
    }

}

?>
