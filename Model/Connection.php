<?php

class Connection
{
    private $PDO;
    public function openConnection() : PDO {

        require ('resources/config.php');

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $pdo = new PDO('mysql:host='. $dbhost .';dbname='. $db, $dbuser, $dbpass, $driverOptions);

        $this->PDO = $pdo;
        return $pdo;

    }
//Function that inserts students into database, parameter is Student CLASS
    public function insertStudent(Student $student)
    {
        $this->PDO;
        $handle = $this->openConnection()->prepare("INSERT INTO student (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
        $handle->bindValue(':first_name', $student->getFName());
        $handle->bindValue(':last_name', $student->getLName());
        $handle->bindValue(':email', $student->getEmail());
        $handle->bindValue(':password', $student->getPassword());
        $handle->execute();
    }

//Function to display the whole database
    public function displayStudent()
    {
        $handle = $this->openConnection()->prepare("SELECT * FROM student");
        $handle->execute();
        $displayStudents = $handle->fetchAll();
        return $displayStudents;
    }

//Function to display 1 student using his ID (Profile page)
    public function profileStudent()
    {
        $userId = $_GET['user'];
        $handle = $this->openConnection()->prepare("SELECT * FROM student where id = :id");
        $handle->bindParam(':id', $userId);
        $handle->execute();
        $profileStudents = $handle->fetch();
        return $profileStudents;
    }

//Update a student if you are on profile
    //Don't forget id WHERE :id, else it will delete your whole db
    public function updateStudent(string $fName, string $lName, string $email, string $password, int $id)
    {
        $handle = $this->openConnection()->prepare('UPDATE student SET first_name = :fName, last_name = :lName, email = :email, password = :password WHERE id = :id');
        $handle->bindParam(':fName', $fName);
        $handle->bindParam(':lName', $lName);
        $handle->bindParam(':email', $email);
        $handle->bindParam(':password', $password);
        $handle->bindParam(':id', $id);
        $handle->execute();
    }
//Delete a student while you are on profile page
    public function deleteStudent(int $id)
    {
        $handle = $this->openConnection()->prepare('DELETE FROM student where id = :id');
        $handle->bindParam(':id', $id);
        $handle->execute();
    }

//Function to pass hash to Auth class using student email
    public function getHash(string $email)
    {
        $handle = $this->openConnection()->prepare("SELECT password FROM student where email = :email");
        $handle->bindParam(':email', $email);
        $handle->execute();
        return $handle->fetch();
    }

}
