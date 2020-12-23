<?php
    class Users extends Controller
    {
        public function __construct()
        {
            $this->usermodel = $this->model('User');

        }

        public function register()
        {
            //chock for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //validate email
                if(empty($data['email']))
                {
                    $data['email_err'] = 'Please enter your email';
                }
                else
                {
                    //check email
                    if ($this->usermodel->finduserbyemail($data['email']))
                        $data['email_err'] = 'Email is already taken';
                        
                }
                //echo "eror" . $data['email_err'];
                //validate name
                if(empty($data['name']))
                {
                    $data['name_err'] = 'Please enter your name';
                }
                else if (!ctype_alnum($data['name']))
                {
                    $data['name_err'] = 'Please name Should be AlphaNumeric';
                }
                //validate password
                if(empty($data['password']))
                {
                    $data['password_err'] = 'Please enter your password';
                }
                else if(strlen($data['password']) < 6)
                {
                    $data['password_err'] = 'Password must be at least 6 charachters';
                }
                //validate confirm password
                if(empty($data['confirm_password']))
                {
                    $data['confirm_password_err'] = 'Please confirm your password';
                }
                else
                {
                    if ($data['password'] != $data['confirm_password'])
                    {
                        $data['confirm_password_err'] = 'Password do not match';   
                    }
                }
                //make sure errors are empty
                if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))
                {
                    //hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    //load view with errors
                    //$this->view('users/register', $data);
                    // register uder
                    if ($this->usermodel->register($data))
                    {
                        flash('register_success', 'You are registered and can log in');
                        redirect('users/login');
                    }
                    else
                        die('tkhawr');
                }
                else
                    $this->view('users/register', $data);
            }
            else
            {
                //init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                //load view
                $this->view('users/register', $data);
            }
        }

        public function login()
        {
            //chock for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //process form
                //process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                //validate email
                if(empty($data['email']))
                {
                    $data['email_err'] = 'Please enter your email';
                }
                //validate password
                if(empty($data['password']))
                {
                    $data['password_err'] = 'Please enter your password';
                }

                //check for user/email
                if ($this->usermodel->finduserbyemail($data['email']))
                {

                }
                else
                {
                    $data['email_err'] = 'No user found';

                }

                //make sure errors are empty
                if (empty($data['email_err']) && empty($data['password_err']))
                {
                    //check and set logged in user
                    $loggeduser = $this->usermodel->login($data['email'], $data['password']);
                    if ($loggeduser)
                    {
                        //create session
                        $this->createuser($loggeduser);
                    }
                    else
                    {
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }
                }
                else
                {
                    //load view with errors
                    $this->view('users/login', $data);
                }
            }
            else
            {
                //init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
                //load view
                $this->view('users/login', $data);
            }
        }

        public function createuser($user)
        {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('pages/index');
        }

        public function logout()
        {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

        public function islogged()
        {
            if (isset($_SESSION['user_id']))
                return true;
            else
                return false;
        }
    }