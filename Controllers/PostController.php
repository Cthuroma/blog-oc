<?php


namespace App\Controllers;

use App\Classes\View;

use App\Managers\PostManager;
use App\Managers\CommentManager;

use App\Models\Comment;

class PostController extends Controller
{
    public function showPost()
    {
        $view = new View('post');
        $manager = new PostManager();
        $commentManger = new CommentManager();
        $this->pageData['post'] = $manager->find($this->urlArgs[0]);
        $this->pageData['notification'] = $this->request->input('notification');
        $this->pageData['comments'] = $commentManger->postComments($this->urlArgs[0]);
        $this->pageData['pageTitle'] = 'Blog-OC - '.$this->pageData['post']->getTitle();
        $view->render($this->pageData);
    }

    public function showPostList()
    {
        $view = new View('post_list');
        if(isset($this->urlArgs[0])){
            $page = $this->urlArgs[0];
        }else{
            $page = 1;
        }
        $manager = new PostManager();
        $this->pageData['posts'] = $manager->postList($page);
        $this->pageData['pageTitle'] = 'Blog-OC - Posts';
        $this->pageData['page'] = $page;
        $view->render($this->pageData);
    }

    public function postComment()
    {
        $view = new View();
        $this->verifyCSRF();
        $comment = new Comment();
        $comment->setContent($this->request->input('comment'));
        $comment->setDate(new \DateTimeImmutable());
        $comment->setAuthor($this->pageData['loggedUser']);
        $comment->setPost($this->urlArgs[0]);
        $manager = new CommentManager();
        if(!$manager->createComment($comment)){
            throw new \Exception('Comment failed to post.', 500);
        }
        $view->redirect('post/'.$this->urlArgs[0].'?notification=comment');
    }
}
