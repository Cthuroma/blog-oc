<?php

namespace App\Managers;

use App\Models\Post;

class PostManager extends Manager
{
    /*
     UPDATE table SET col = :col, col2 = :col2 WHERE table_id = :id

     INSERT INTO table (col, col2) VALUES (:col, :col2)
    */
    public function list()
    {
        $query = "SELECT * FROM posts ORDER BY post_edit_date DESC";
        $req = $this->db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
            $model = new Post();
            $model->setId($row['post_id']);
            $model->setTitle($row['post_title']);
            $model->setSubtitle($row['post_subtitle']);
            $model->setImage($row['post_image']);
            $model->setImageDescr($row['post_image_descr']);
            $model->setCreaDate(new \DateTimeImmutable($row['post_crea_date']));
            $model->setEditDate(new \DateTimeImmutable($row['post_edit_date']));
            $authorManager = new UserManager();
            $model->setAuthor($authorManager->find($row['post_author']));
            $collection[] = $model;
        };
        return $collection;
    }

    public function find($id)
    {
        $query = "SELECT * FROM posts WHERE post_id = :id";
        $req = $this->db->prepare($query);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(\PDO::FETCH_ASSOC);

        $model = new Post();
        $model->setId($row['post_id']);
        $model->setTitle($row['post_title']);
        $model->setSubtitle($row['post_subtitle']);
        $model->setContent($row['post_content']);
        $model->setImage($row['post_image']);
        $model->setImageDescr($row['post_image_descr']);
        $model->setCreaDate(new \DateTimeImmutable($row['post_crea_date']));
        $model->setEditDate(new \DateTimeImmutable($row['post_edit_date']));
        $authorManager = new UserManager();
        $model->setAuthor($authorManager->find($row['post_author']));

        return $model;
    }

    public function postList($page = 1)
    {
        $query = "SELECT * FROM posts ORDER BY post_edit_date DESC LIMIT :offset, 15";
        $req = $this->db->prepare($query);
        $req->bindValue(':offset', ($page-1)*15, \PDO::PARAM_INT);
        $req->execute();
        while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
            $model = new Post();
            $model->setId($row['post_id']);
            $model->setTitle($row['post_title']);
            $model->setSubtitle($row['post_subtitle']);
            $model->setCreaDate(new \DateTimeImmutable($row['post_crea_date']));
            $model->setEditDate(new \DateTimeImmutable($row['post_edit_date']));
            $authorManager = new UserManager();
            $model->setAuthor($authorManager->find($row['post_author']));
            $collection[] = $model;
        };
        if(isset($collection)){
            return $collection;
        }
        throw new \Exception('No more posts', 404);
    }

    public function createPost(Post $post)
    {
        $query = "INSERT INTO posts (post_title, post_subtitle, post_content,  post_image, post_image_descr, post_crea_date, post_edit_date, post_author) VALUES (:post_title, :post_subtitle, :post_content, :post_image, :post_image_descr, :post_crea_date, :post_edit_date, :post_author)";
        $req = $this->db->prepare($query);
        $req->bindValue(':post_title', $post->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':post_subtitle', $post->getSubtitle(), \PDO::PARAM_STR);
        $req->bindValue(':post_content', $post->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':post_image', $post->getImage(), \PDO::PARAM_STR);
        $req->bindValue(':post_image_descr', $post->getImageDescr(), \PDO::PARAM_STR);
        $req->bindValue(':post_crea_date', $post->getCreaDate()->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $req->bindValue(':post_edit_date', $post->getEditDate()->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $req->bindValue(':post_author', $post->getAuthor()->getId(), \PDO::PARAM_INT);
        $req->execute();
        return $this->db->lastInsertId('posts');
    }

}
