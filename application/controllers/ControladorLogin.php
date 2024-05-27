<?php
class ControladorLogin extends CI_Controller {

    public function index() {
        $this->load->view('Login.php');
    }

    public function Login() {
        $rut = $this->input->post('rut');
        $password = $this->input->post('password');
    
        $this->load->model('ModeloLogin');
    
        $user = $this->ModeloLogin->iniciarSesion($rut);
    
        if ($user === '1') {
            $data['error'] = 'Sistema Bloqueado por no pago.';
            $this->load->view('Login.php', $data);
        }
        
        if ($user !== false && property_exists($user, 'contrasena') && password_verify($password, $user->contrasena)) {
            $session_data = array(
                'id_usuario' => $user->id_usuario,
                'rut' => $user->rut, 
            );
            $this->session->set_userdata($session_data);
            redirect('ControladorMenu/index');
        } elseif ($user === false){
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
