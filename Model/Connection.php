<?php

class Connection
{
    private $PDO;
    public function openConnection() : PDO {
// Try to figure out what these should be for you

        require ('resources/config.php');

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

// Try to understand what happens here
        $pdo = new PDO('mysql:host='. $dbhost .';dbname='. $db, $dbuser, $dbpass, $driverOptions);

// Why we do this here
        $this->PDO = $pdo;
        return $pdo;

    }

    public function insertStudent(Student $student)
    {
        $this->PDO;
        $handle = $this->openConnection()->prepare("INSERT INTO student (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
        $handle->bindValue(':first_name', $student->getFName());
        $handle->bindValue(':last_name', $student->getLName());
        $handle->bindValue(':email', $student->getEmail());
        $handle->execute();
    }

    public function displayStudent()
    {
        $this->PDO;
        $handle = $this->openConnection()->prepare("SELECT * FROM student");
        $handle->execute();
        $displayStudents = $handle->fetchAll();
        return $displayStudents;
    }

    public function profileStudent()
    {
        $this->PDO;
        $userId = $_GET['user'];
        $handle = $this->openConnection()->prepare("Select * FROM student where id = :id");
        $handle->bindParam(':id', $userId);
        $handle->execute();
        $profileStudents = $handle->fetch();
        return $profileStudents;
    }

}
