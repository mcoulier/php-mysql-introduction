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

        $passCheck = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['email'] = $_POST["email"];

            $stmt = $connection->openConnection()->prepare("SELECT * FROM student WHERE email = ?");
            $stmt->execute([$_POST["email"]]);
            $user = $stmt->fetch();

/*            && password_verify($_POST["register_password"], $user['password']*/
            if ($user)
            {
                $passCheck = "valid";
            } else {
                $passCheck = "invalid";
            }
        }

        require 'View/login.php';
    }
}