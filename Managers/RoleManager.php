<?php

namespace App\Managers;

use App\Models\Role;

class RoleManager extends Manager
{
    public function getAll()
    {
        $query = "SELECT * FROM roles";
        $req = $this->db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
            $model = new Role();
            $model->setId($row['role_id']);
            $model->setRole($row['role_name']);
            $collection[] = $model;
        };
        return $collection;
    }

    public function find($id)
    {
        $query = "SELECT * FROM role WHERE role_id = :id";
        $req = $this->db->prepare($query);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(\PDO::FETCH_ASSOC);

        $model = new Role();
        $model->setId($row['role_id']);
        $model->setRole($row['role_name']);

        return $model;
    }
}
