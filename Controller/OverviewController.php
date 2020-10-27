<?php
declare(strict_types = 1);

class OverviewController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $connection = new Connection();
        $showStudents = $connection->displayStudent();


        require 'View/overview.php';
    }
}