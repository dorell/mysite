<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

    class UserLibrary {

        public function __construct() {
            $this->CI = & get_instance(); #access to instance
            
            #Models
            $this->CI->load->model('Model_User');
        }
    
        public function login($user, $password) {
            $query = $this->CI->Model_User->get_login($user, $password);
            if($query->num_rows() > 0) {
                $user = $query->row();
                $session_data = array('user' => $user->name,
                                    'user_id' => $user->id,
                                    'profile_id' => $user->profile_id,);
            $this->CI->session->set_userdata($session_data);
            return TRUE;
            } else {
                $this->CI->session->sess_destroy();
                return FALSE;
            }
        }
        
        public function change_password($current, $new) {
            #check if user is already loged
            if($this->CI->session->userdata('user_id') == null) {
                return FALSE;
            }

            $id = $this->CI->session->userdata('user_id');
            $user = $this->CI->Model_User->find($id);

            #check current password
            if($user->password == $current) {
                $data = array('id' => $id,
                            'password' => $new);
                $this->CI->Model_User->update($data);
            } else {
                return FALSE;
            }
        }
    }
        
    
?>