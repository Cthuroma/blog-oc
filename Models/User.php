<?php

namespace App\Models;

class User implements \Serializable
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_OWNER = 3;


    private $id;
    private $mail;
    private $name;
    private $password;
    private $registrationDate;
    private $verifToken;
    private $role;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    }

    public function getVerifToken()
    {
        return $this->verifToken;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function isAdmin(){
        return $this->role == self::ROLE_ADMIN ? true : false;
    }

    public function isOwner(){
        return $this->role == self::ROLE_OWNER ? true : false;
    }

    static  public function create($name, $email,$password){
        $user = new User();
        $user->setName($name);
        $user->setMail($email);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $user->generateToken();
            $user->setRegistrationDate(new \DateTimeImmutable());
            $user->setRole(self::ROLE_USER);
        return $user;
    }

    public function generateToken(){
        $this->verifToken = md5(uniqid('blog-oc'));
    }

    public function serialize() {
        return serialize([
            $this->id,
            $this->name,
            $this->role,
        ]);
    }
    public function unserialize($data) {
        list(
            $this->id,
            $this->name,
            $this->role,
            ) = unserialize($data);
    }

}
