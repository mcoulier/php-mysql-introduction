<?php
declare(strict_types = 1);

class LoginController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        session_start();
        $connection = new Connection();

        if (!isset($_SESSION['email'])) {
            $_SESSION['email'] = "";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['email'] = $_POST["email"];
            $email = $_POST['email'];

            $handle = $connection->openConnection()->prepare("SELECT email FROM student where email = :email");
            $handle->bindParam(':email', $email);
            $handle->execute();
            $user = $handle->fetch();
            $passCheck = "";
            if ($user)
            {
                $passCheck = "valid";
            } else {
                $passCheck = "invalid";
            }





/*            && password_verify($_POST["register_password"], $user['password']*/

        }

        require 'View/login.php';
    }
}