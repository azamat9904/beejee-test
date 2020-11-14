<?php
    namespace application\models;
    use application\core\Model;
    
    class User extends Model{

        public function validateUser($email, $password){
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            $data['email'] = checkInput($email);
            $data['password'] = checkInput($password);

            if(empty($data['email']))
                 $data['email_err'] = 'Email is required';
            else if($data['email'] !== USER['email']){
                 $data['email_err'] = 'Email is incorrect';
            }

            if(empty($data['password']))
                $data['password_err'] = 'Password is required';
            else if($data['password'] !== USER['password']){
                $data['password_err'] = 'Password is incorrect';
            }
            

            if(empty($data['email_err']) && empty($data['password_err'])){
                return ['isValid' => true, 'data' => $data];
            }
            
            return ['isValid' => false, 'data' => $data];
        }
    }