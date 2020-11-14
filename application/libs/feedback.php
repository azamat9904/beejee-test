<?php
    function createFeedback($name = '', $message = '', $class = 'alert alert-success'){
        if(!empty($name) && !empty($message) && empty($_SESSION[$name])){
            $_SESSION[$name] = $message;
            $_SESSION[$name. '_class'] = $class;
        } 
    }

    function showFeedback($name){
        if(!empty($name) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }