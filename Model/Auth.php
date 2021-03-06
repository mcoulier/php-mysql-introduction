<?php

class Auth
{
    private Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }
//Check email with database, USED in LoginController
    public function checkEmail(string $email)
    {
        $handle = $this->connection->openConnection()->prepare("SELECT email FROM student where email = :email");
        $handle->bindParam(':email', $email);
        $handle->execute();
        $user = $handle->fetch();
        if ($user)
        {
            return "valid";
        } else {
            return "invalid";
        }
    }

//Check password with database, USED in LoginController
    public function checkPassword(string $password, string $email)
    {
        $hash = $this->connection->getHash($email);
        if(password_verify($password, $hash['password'])){
            return "valid";
        } else {
            return "invalid";
        }
    }

/*    public function validateEmail(string $email)
    {
        $handle = $this->connection->openConnection()->prepare("SELECT * FROM student WHERE email = ?");
        $handle->execute([$_POST["email"]]);
        $user = $handle->fetch();

    }*/

}