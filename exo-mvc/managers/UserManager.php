<?php

require 'AbstractManager.php';
require 'models/User.php';

class UserManager extends AbstractManager
{
    public function __construct(string $dbName, string $port, string $host, string $username, string $password)
    {
        $this->dbName = $dbName;
        $this->port = $port;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function getAllUsers() : array
    {
        $usersTab = [];

        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($users as $user)
        {
            $userToPush = new User($user["email"], $user["username"], $user["password"])
            $userToPush->setId($user["id"]);
            $usersTab[] = $userToPush;
        }

        return $usersTab
    }

    public function getUserById(int $id) : User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        $userToLoad = new User($user['email'], $user['username'], $user['password']);
        $userToLoad->setId($user['id']);

    }

    /*public function getUserByEmail(string $email) : User
    {
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
        'email' => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        $userToLoad = new User($user['email'], $user['username'], $user['password']);
        $userToLoad->setId($user['id']);
    }*/

    public function insertUser(User $user) : User
    {
        $query = $this->db->prepare('INSERT INTO users (`id`, `email`, `username`, `password`) VALUES(NULL, :email, :username, :password)');

        $parameters = [
        'email' => $user->getEmail(),
        'username' => $user->getUsername(),
        'password'=>$user->getPassword()
        ];
        $query->execute($parameters);

        /*$query = $db->prepare('SELECT LAST_INSERT_ID() FROM users');
        $query->execute();
        $userSelected = $query->fetch(PDO::FETCH_ASSOC);

        return $this->getUserById($userSelected['id']);*/

        $id = $this->db->lastInsertId();
        $user->setId($id);
        return $user;

    }

    public function editUser(User $user) : void
    {
        $query = $this->db->prepare('UPDATE users SET email = :email, username = :username,  password = :password WHERE id = :id ');
        $parameters = [
            'id' = $user->getId(),
            'email' = $user->getEmail(),
            'username' = $user->getUsername(),
            'password' = $user->getPassword()
            ];

        $query->execute($parameters);
    }

}

    /*getAllUsers() : array
qui renvoie la liste de tous les utilisateurs présents dans la base de données

getUserById(int $id) : User
qui renvoie l'utilisateur correspondant à l'$id dans la base de donn'és.

insertUser(User $user) : User
qui insère l'utilisateur dans la base de données puis le retourne avec son nouvel $id.

editUser(User $user) : void
qui modifie l'utilisateur dans la base de données.*/
}