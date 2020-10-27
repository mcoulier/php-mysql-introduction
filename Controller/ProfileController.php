<?php
declare(strict_types = 1);

class ProfileController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $connection = new Connection();
        $showProfileStudents = $connection->profileStudent();

        require 'View/profile.php';
    }
}