<?php

class Student{
    private string $fName;
    private string $lName;
    private string $email;

    public function __construct(string $fName, string $lName, string $email)
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFName(): string
    {
        return $this->fName;
    }

    /**
     * @return string
     */
    public function getLName(): string
    {
        return $this->lName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }


}