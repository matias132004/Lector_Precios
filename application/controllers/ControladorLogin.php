<?php
class ControladorLogin extends CI_Controller {

    public function index() {
        $this->load->model('ModeloLogin');
        
        $token = $this->input->cookie('login_token');
        if ($token) {
            $user = $this->ModeloLogin->verificarToken($token);
            if ($user) {
                // Verificar si el usuario tiene el pago de datos local activo
                $pago_dato_local = $this->ModeloLogin->verificarPagoDatoLocal($user->id_usuario);
                if (!$pago_dato_local) {
                    $data['error'] = 'El acceso ha sido denegado debido a que el pago del dato local no está activo.';
                    $this->load->view('Login.php', $data);
                    return;
                }
                
                $session_data = array(
                    'id_usuario' => $user->id_usuario,
                    'rut' => $user->rut,
                );
                $this->session->set_userdata($session_data);
                redirect('ControladorMenu/index');
                return;
            }
        }

        $this->load->view('Login.php');
    }

    public function Login() {
        $rut = $this->input->post('rut');
        $password = $this->input->post('password');
    
        $this->load->model('ModeloLogin');
    
        $user = $this->ModeloLogin->iniciarSesion($rut);
    
        if ($user === '1') {
            $data['error'] = 'El acceso ha sido denegado debido a que usted no a cancelado, moroso.';
            $this->load->view('Login.php', $data);
            return;
        }
        
        if ($user !== false && property_exists($user, 'contrasena') && password_verify($password, $user->contrasena)) {
            $session_data = array(
                'id_usuario' => $user->id_usuario,
                'rut' => $user->rut,
            );
            $this->session->set_userdata($session_data);

            // Generar un token único
            $token = bin2hex(random_bytes(16));
            $this->ModeloLogin->guardarToken($user->id_usuario, $token);

            // Guardar el token en una cookie que expire en 100 años
            $cookie = array(
                'name'   => 'login_token',
                'value'  => $token,
                'expire' => 3155695200, // 100 years
                'secure' => TRUE
            );
            $this->input->set_cookie($cookie);

            redirect('ControladorMenu/index');
        } else {
            $data['error'] = 'Usuario o contraseña incorrectos.';
            $this->load->view('Login.php', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('id_usuario');
        $this->session->sess_destroy();

        // Borrar la cookie
        $cookie = array(
            'name'   => 'login_token',
            'value'  => '',
            'expire' => '0', // fecha en el pasado para borrar la cookie
            'secure' => TRUE
        );
        $this->input->set_cookie($cookie);

        redirect('ControladorLogin/index');
    }
}
