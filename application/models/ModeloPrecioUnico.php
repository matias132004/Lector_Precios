<?php

class ModeloPrecioUnico extends CI_Model {

    public function selectPrecio($cbarra) {
        try {
            // Tu consulta SQL aquí
            $query = "SELECT p.id_producto, p.nombre_producto, p.total, p.cbarra, pv.desde, pv.hasta, pv.precio_bruto, um.nombre_corto
FROM producto p
JOIN umedida um ON p.id_umedida = um.id_umedida
LEFT JOIN pvolumen pv ON p.id_producto = pv.id_producto
LEFT JOIN promocion prom ON p.id_producto = prom.id_producto
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
