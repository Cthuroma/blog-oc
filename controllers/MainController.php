<?php


class MainController extends Controller
{
    public function showHome()
    {
        $view = new View('home');
        $view->render();
    }

    public function showPost()
    {
        $view = new View('post');
        $view->render();
    }

    public function showPostList()
    {
        $view = new View('post_list');
        $view->render();
    }
}
