<?php

namespace App\Models;

class Post
{
    private $id;
    private $title;
    private $subtitle;
    private $content;
    private $image;
    private $imageDescr;
    private $creaDate;
    private $editDate;
    private $author;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImageDescr()
    {
        return $this->imageDescr;
    }

    public function setImageDescr($imageDescr)
    {
        $this->imageDescr = $imageDescr;
    }

    public function getCreaDate()
    {
        return $this->creaDate;
    }

    public function setCreaDate($creaDate)
    {
        $this->creaDate = $creaDate;
    }

    public function getEditDate()
    {
        return $this->editDate;
    }

    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor(?User $author)
    {
        $this->author = $author;
    }
}
