<?php


class MainController
{

    public function showHome($params)
    {
        $view = new View('home');
        $view->render();
    }

    public function showPost($params)
    {
        $view = new View('post');
        $view->render();
    }

    public function showPostList($params)
    {
        $view = new View('post_list');
        $view->render();
    }

}
