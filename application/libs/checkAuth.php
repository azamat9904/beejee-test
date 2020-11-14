<?php
    function isUserLoggedIn(){
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }