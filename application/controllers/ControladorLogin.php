<?php
class ControladorLogin extends CI_Controller {

    public function index() {
        $this->load->view('Login.php');
    }

    public function Login() {
        $rut = $this->input->post('rut');
        $password = $this->input->post('password');

        $this->load->model('ModeloLogin');
        
        $user2 = $this->ModeloLogin->iniciarSesion($rut);

        
        if ($user2 != false && password_verify($password, $user2->contrasena)) {
            $session_data = array(
                'id_usuario' => $user2->id_usuario,
                'rut' => $user2->rut, 
            );
            $this->session->set_userdata($session_data);
            redirect('ControladorMenu/index');
        } else {
            $data['error'] = 'Usuario o contraseña incorrectos.';
            $this->load->view('Login.php', $data);
        }
    }

    
    
    public function logout() {
        
        $this->session->unset_userdata('id_usuario');
        $this->session->sess_destroy('id_usuario');
        redirect('ControladorLogin/index');
    }

}
?>
