<?php

/* User
User.php
La classe User a 4 attributs privés :

$id : int
$email : string
$username : string
$password : string
Son constructeur prend email, username et password en paramètres et les initialise. Il initialise id avec la valeur null.

Tous les attributs ont des getters et setters publics.

la table users
La table users doit représenter tous les champs de votre classe User. */


class User {
    private int $id;
    private string $email;
    private string $username;
    private string $password;

    public function __construct(string $email, string $username, string $password)
    {
        $this->id = NULL;
        $this->email = $email;
        $this->username = $email;
        $this->password = $password;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function setEmail($email) : void
    {
        $this->email = $email;
    }

    public function setUsername($username) : void
    {
        $this->username = $username;
    }

    public function setPassword($password) : void
    {
        $this->password = $password;
    }
}