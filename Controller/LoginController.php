<?php
declare(strict_types = 1);

class LoginController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        session_start();
        $connection = new Connection();
        $auth = new Auth();
        $checkEmail = "";

        if (!isset($_SESSION['email'])) {
            $_SESSION['email'] = "";
        }

//When button is clicked, email gets checked in db, returns yes = valid / no = invalid
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['email'] = $_POST["email"];
            $email = $_POST['email'];

            $checkEmail = $auth->checkEmail($email);

        }

        require 'View/login.php';
    }
}