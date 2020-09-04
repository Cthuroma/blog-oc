<?php

namespace App\Managers;

use App\Models\User;

class UserManager extends Manager
{
    public function register(User $user)
    {
        $query = "INSERT INTO users (name, mail, password, registration_date, role, verif_token) VALUES (:name, :mail, :password, :registration_date, :role, :verif_token)";
        $req = $this->db->prepare($query);
        $req->bindValue(':name', $user->getName(), \PDO::PARAM_STR);
        $req->bindValue(':mail', $user->getMail(), \PDO::PARAM_STR);
        $req->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
        $req->bindValue(':registration_date', $user->getRegistrationDate()->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $req->bindValue(':role', $user->getRole(), \PDO::PARAM_INT);
        $req->bindValue(':verif_token', $user->getVerifToken(), \PDO::PARAM_STR);
        $req->execute();
        return $this->db->lastInsertId('users');
    }

    public function validateMail($token)
    {
        $query = "SELECT * FROM users WHERE verif_token = :token";
        $req = $this->db->prepare($query);
        $req->bindValue(':token', $token, \PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(\PDO::FETCH_ASSOC);
        if(empty($row)){
            return false;
        }
        $user = new User;
        $user->setId($row['id']);
        $user->setMail($row['mail']);
        $user->setName($row['name']);
        $user->setRole($row['role']);
        if($this->update($user)){
            return true;
        }
        return false;
    }

    public function update(User $user)
    {
        $query = "UPDATE users SET name = :name, mail = :mail, role = :role, verif_token = :verif_token WHERE id = :id";
        $req = $this->db->prepare($query);
        $req->bindValue(':id', $user->getId(), \PDO::PARAM_INT);
        $req->bindValue(':name', $user->getName(), \PDO::PARAM_STR);
        $req->bindValue(':mail', $user->getMail(), \PDO::PARAM_STR);
        $req->bindValue(':role', $user->getRole(), \PDO::PARAM_INT);
        $req->bindValue(':verif_token', null, \PDO::PARAM_NULL);
        $req->execute();
        return true;
    }

    public function login($mail)
    {
        $query = "SELECT * FROM users WHERE ISNULL(verif_token) AND mail = :mail";
        $req = $this->db->prepare($query);
        $req->bindValue(':mail', $mail, \PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(\PDO::FETCH_ASSOC);
        if(empty($row)){
            return false;
        }
        $user = new User;
        $user->setId($row['id']);
        $user->setMail($row['mail']);
        $user->setPassword($row['password']);
        $user->setName($row['name']);
        $user->setRole($row['role']);
        return $user;
    }

    public function find($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $req = $this->db->prepare($query);
        $req->bindValue(':id', $id, \PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(\PDO::FETCH_ASSOC);
        if(empty($row)){
            throw new \Exception('User not found.', 404);
        }
        $user = new User;
        $user->setId($row['id']);
        $user->setMail($row['mail']);
        $user->setName($row['name']);
        $user->setRole($row['role']);
        return $user;
    }

    public function list()
    {
        $query = "SELECT * FROM users WHERE ISNULL(verif_token)";
        $req = $this->db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
            $user = new User;
            $user->setId($row['id']);
            $user->setMail($row['mail']);
            $user->setName($row['name']);
            $user->setRole($row['role']);
            $user->setRegistrationDate(new \DateTimeImmutable($row['registration_date']));
            $collection[] = $user;
        };
        return $collection;
    }

    public function promoteUser($id)
    {
        $query = "UPDATE users SET role = :role WHERE id = :id";
        $req = $this->db->prepare($query);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->bindValue(':role', User::ROLE_ADMIN, \PDO::PARAM_INT);
        $req->execute();
        return true;
    }

    public function downgradeUser($id)
    {
        $query = "UPDATE users SET role = :role WHERE id = :id";
        $req = $this->db->prepare($query);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->bindValue(':role', User::ROLE_USER, \PDO::PARAM_INT);
        $req->execute();
        return true;
    }
}
