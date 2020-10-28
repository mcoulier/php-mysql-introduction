<?php

class Auth
{
    private Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function validateEmail()
    {

    }

}