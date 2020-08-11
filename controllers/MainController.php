<?php


class MainController
{

    public function showHome(Request $req, Array $urlArgs)
    {
        $view = new View('home');
        $view->render();
    }

    public function showPost(Request $req, Array $urlArgs)
    {
        $view = new View('post');
        $view->render();
    }

    public function showPostList(Request $req, Array $urlArgs)
    {
        $view = new View('post_list');
        $view->render();
    }

}
