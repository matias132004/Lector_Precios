<?php
class ModeloPromocionPorImagen extends CI_Model
{

    public function obtenerPromocionPorImagen()
    {
        $query = $this->db->query("
        SELECT 
        id_promocion_imagen, 
        id_estado, 
        nombre, 
        fecha_inicio,
        fecha_fin
    FROM 
        promocion_por_imagen
    WHERE 
        id_estado = 1
        AND fecha_fin > NOW()
        AND (
            EXTRACT(DOW FROM NOW()) = 1 AND lunes = 't'
            OR EXTRACT(DOW FROM NOW()) = 2 AND martes = 't'
            OR EXTRACT(DOW FROM NOW()) = 3 AND miercoles = 't'
            OR EXTRACT(DOW FROM NOW()) = 4 AND jueves = 't'
            OR EXTRACT(DOW FROM NOW()) = 5 AND viernes = 't'
            OR EXTRACT(DOW FROM NOW()) = 6 AND sabado = 't'
            OR EXTRACT(DOW FROM NOW()) = 0 AND domingo = 't'
        );");

        $result = $query->result();

        return $result;
    }

    public function selectConfiguracionPromocion($id_usuario)
    {
        $querySelect = $this->db->query("SELECT configuracionesPromocion.*, fuente.nombre_fuente
            FROM configuracionesPromocion  
            INNER JOIN usuario ON usuario.id_datos_local = configuracionesPromocion.id_datos_local
            INNER JOIN fuente ON configuracionesPromocion.id_fuente = fuente.id_fuente
            WHERE usuario.id_usuario = '$id_usuario'");
        return $querySelect->row();
    }
    public function verificarPagoDatoLocal($id_usuario)
    {
        $query = $this->db->query("SELECT dt.pago FROM usuario u INNER JOIN datos_local dt ON u.id_datos_local = dt.id_datos_local WHERE u.id_usuario = ? AND dt.pago = 't'", array($id_usuario));
        return $query->num_rows() > 0;
    }
}
