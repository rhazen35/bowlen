<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "app\\controller\\Login" ) ):

    class Login extends Controller
    {
        protected $login;
        protected $login_user;

        public function __construct()
        {
            $this->login = $this->model('Login');
            $this->login_user = $this->model('LoginUser');
        }

        public function index()
        {
            $this->view('home/index', []);
        }

        public static function is_logged_in()
        {
            return( isset( $_SESSION['login'] ) && !empty( $_SESSION['login'] ) ? true : false );
        }

        public function authorize()
        {
            $email    = ( !empty( $_POST['email'] ) ? trim( $_POST['email'] ) : "" );
            $password = ( !empty( $_POST['password'] ) ? trim( $_POST['password'] ) : "" );
            $user     = false;
            $staff    = false;

            if( !empty( $email ) && !empty( $password ) ):
                $data = $this->login->read_where_email(['email' => $email]);

                if( empty( $data ) ):
                    $data = $this->login->read_where_email_staff(['email' => $email]);
                    $staff = true;
                else:
                    $user = true;
                endif;

                if( $this->verify( $data->hash, $password ) ):
                    $_SESSION['login'] = $data->id;
                    if( $user ):
                        $this->register_login();
                    endif;
                    $this->redirect("home/index");
                else:
                    $this->redirect("login/failed");
                endif;
            else:
                return( false );
            endif;

            return(false);
        }

        private function verify( $data, $password )
        {
            if( !empty( $data ) ):
                if( !empty( $data ) ):
                    $verify = !empty( $data ) ? password_verify( $password, $data ) : "";
                    return( $verify );
                else:
                    return( false );
                endif;
            else:
                return( false );
            endif;
        }

        public function register_login()
        {
            $data = $this->login_user->register_login();

            if( empty( $data ) ):
                $this->login_user->register_new_login();
            else:
                $this->login_user->update_user_login( $data );
            endif;
        }

        public function failed()
        {
            $this->index();
            $this->view_messages('login/failed', []);
        }

        public function logout()
        {
            unset( $_SESSION['login'] );
            $this->redirect("home/index");
        }

    }

endif;