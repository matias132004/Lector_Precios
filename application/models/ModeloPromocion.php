<?php
class ModeloPromocion extends CI_Model {

    public function obtenerPromocion() {
        $query = $this->db->query("
            SELECT 
                p.id_promocion, 
                p.id_producto, 
                p.id_estado, 
                pr.nombre_producto, 
                pr.descripcion as descripcionproducto,  
                pr.cbarra, 
                pr.total, 
                pr.precio_old, 
                p.fecha_inicio,
                p.fecha_fin,
                p.descripcion,
                i.nombre AS nombre_imagen,
                i.image_data AS datos_imagen
            FROM 
                promocion p
            INNER JOIN 
                producto pr ON p.id_producto = pr.id_producto
            LEFT JOIN 
                images_promocion i ON p.id_promocion = i.id_promocion
            WHERE 
                p.id_estado = 1
                AND p.fecha_fin > NOW()
                AND (
                    EXTRACT(DOW FROM NOW()) = 1 AND p.lunes = 't'
                    OR EXTRACT(DOW FROM NOW()) = 2 AND p.martes = 't'
                    OR EXTRACT(DOW FROM NOW()) = 3 AND p.miercoles = 't'
                    OR EXTRACT(DOW FROM NOW()) = 4 AND p.jueves = 't'
                    OR EXTRACT(DOW FROM NOW()) = 5 AND p.viernes = 't'
                    OR EXTRACT(DOW FROM NOW()) = 6 AND p.sabado = 't'
                    OR EXTRACT(DOW FROM NOW()) = 0 AND p.domingo = 't'
                );");

        $result = $query->result();

        foreach ($result as $promocion) {
            $promocion->total = number_format($promocion->total, 0, '', '.');
            $promocion->precio_old = number_format($promocion->precio_old, 0, '', '.');
        }

        return $result;
    }

    public function selectConfiguracionPromocion($id_usuario) {
        $querySelect = $this->db->query("SELECT configuracionesPromocion.*, fuente.nombre_fuente
            FROM configuracionesPromocion  
            INNER JOIN usuario ON usuario.id_datos_local = configuracionesPromocion.id_datos_local
            INNER JOIN fuente ON configuracionesPromocion.id_fuente = fuente.id_fuente
            WHERE usuario.id_usuario = '$id_usuario'");
        return $querySelect->row(); 
    }
    public function verificarPagoDatoLocal($id_usuario) {
        $query = $this->db->query("SELECT dt.pago FROM usuario u INNER JOIN datos_local dt ON u.id_datos_local = dt.id_datos_local WHERE u.id_usuario = ? AND dt.pago = 't'", array($id_usuario));
        return $query->num_rows() > 0;
    }
    
}
