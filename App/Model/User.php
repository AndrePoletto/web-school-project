<?php

class User
{
    private static $SQL = "INSERT INTO user (userName, password, email, firstName, lastName) VALUES (:userName, :password, :email, :firstName, :lastName)";

    private $id = -1; // default invalid
    private $userName;
    private $password;
    private $email;
    private $firstName;
    private $lastName;

    private $dbCon;

    private $stmt;

    public function __construct($userName, $password, $email, $firstName, $lastName)
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        $this->dbCon = Database::getConnection();

        $this->stmt = $this->dbCon->prepare(User::$SQL);

        $this->stmt->bindParam(':userName', $this->userName);
        $this->stmt->bindParam(':password', $this->password);
        $this->stmt->bindParam(':email', $this->email);
        $this->stmt->bindParam(':firstName', $this->firstName);
        $this->stmt->bindParam(':lastName', $this->lastName);


    }

    public function save()
    {
        $this->stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

//    public static function getUserByUserName()
//    {
//        $sql = "";
//        $dbCon = Database::getConnection();
//        $stmt = $dbCon->prepare($sql);
//
//
//    }

}