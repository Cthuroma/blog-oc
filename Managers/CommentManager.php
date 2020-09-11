<?php

namespace App\Managers;

use App\Models\Comment;

class CommentManager extends Manager
{
    public function postComments($postId)
    {
        $query = "SELECT * FROM comments WHERE comment_validation = 1 AND comment_post = :post_id ORDER BY comment_date DESC";
        $req = $this->db->prepare($query);
        $req->bindValue(':post_id', $postId, \PDO::PARAM_INT);
        $req->execute();
        $collection = [];
        while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
            $model = new Comment();
            $model->setId($row['comment_id']);
            $model->setContent($row['comment_content']);
            $model->setPost($row['comment_post']);
            $model->setDate(new \DateTimeImmutable($row['comment_date']));
            $model->setValiDate(new \DateTimeImmutable($row['comment_vali_date']));
            $model->setValidation($row['comment_validation']);
            $authorManager = new UserManager();
            $model->setAuthor($authorManager->find($row['comment_author']));
            $collection[] = $model;
        };
        return $collection;
    }

    public function getAll()
    {
        $query = "SELECT * FROM comments ORDER BY comment_date DESC";
        $req = $this->db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
            $model = new Comment();
            $model->setId($row['comment_id']);
            $model->setContent($row['comment_content']);
            $model->setPost($row['comment_post']);
            $model->setDate(new \DateTimeImmutable($row['comment_date']));
            $model->setValiDate(new \DateTimeImmutable($row['comment_vali_date']));
            $model->setValidation($row['comment_validation']);
            $authorManager = new UserManager();
            $model->setAuthor($authorManager->find($row['comment_author']));
            $collection[] = $model;
        };
        return $collection;
    }

    public function getNotValidated()
    {
        $query = "SELECT * FROM comments WHERE comment_validation = 0 ORDER BY comment_date DESC";
        $req = $this->db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
            $model = new Comment();
            $model->setId($row['comment_id']);
            $model->setContent($row['comment_content']);
            $model->setPost($row['comment_post']);
            $model->setDate(new \DateTimeImmutable($row['comment_date']));
            $model->setValiDate(new \DateTimeImmutable($row['comment_vali_date']));
            $model->setValidation($row['comment_validation']);
            $authorManager = new UserManager();
            $model->setAuthor($authorManager->find($row['comment_author']));
            $collection[] = $model;
        };
        return $collection;
    }

    public function createComment(Comment $comment)
    {
        $query = "INSERT INTO comments (comment_content, comment_author, comment_post, comment_date) VALUES (:comment_content, :comment_author, :comment_post, :comment_date)";
        $req = $this->db->prepare($query);
        $req->bindValue(':comment_content', $comment->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':comment_author', $comment->getAuthor()->getId(), \PDO::PARAM_INT);
        $req->bindValue(':comment_post', $comment->getPost(), \PDO::PARAM_INT);
        $req->bindValue(':comment_date', $comment->getDate()->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $req->execute();
        return $this->db->lastInsertId('comment');
    }

    public function validateComment($id){
        $query = "UPDATE comments SET comment_validation = :comment_validation, comment_vali_date = :comment_vali_date WHERE comment_id = :comment_id";
        $req = $this->db->prepare($query);
        $req->bindValue(':comment_id', $id, \PDO::PARAM_INT);
        $req->bindValue(':comment_validation', 1, \PDO::PARAM_INT);
        $date = new \DateTimeImmutable();
        $req->bindValue(':comment_vali_date', $date->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $req->execute();
        return true;
    }

    public function deleteComment($id){
        $query = "DELETE FROM comments WHERE comment_id = :comment_id";
        $req = $this->db->prepare($query);
        $req->bindValue(':comment_id', $id, \PDO::PARAM_INT);
        $req->execute();
        return true;
    }
}
