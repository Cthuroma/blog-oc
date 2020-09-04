<?php


namespace App\Controllers;

use App\Classes\View;

use App\Models\Post;
use App\Managers\PostManager;
use App\Managers\UserManager;
use App\Managers\CommentManager;

class AdminController extends Controller
{
    public function __construct(){
        parent::__construct();
        if( !($this->pageData['loggedUser']) || !($this->pageData['loggedUser']->isAdmin() || $this->pageData['loggedUser']->isOwner())){
            throw new \Exception('Not Allowed', 401);
        }
        $this->pageData['admin'] = true;
    }

    public function showHome(){
        $view = new View('home');
        $this->pageData['pageTitle'] = 'Blog-OC - Admin Home';
        $view->render($this->pageData);
    }

    public function showNewPost(){
        $view = new View('newpost');
        $this->pageData['pageTitle'] = 'Blog-OC - Admin Post';
        $view->render($this->pageData);
    }

    public function showPostList(){
        $view = new View('postlist');
        $manager = new PostManager();
        $this->pageData['posts'] = $manager->list();
        $this->pageData['pageTitle'] = 'Blog-OC - Admin Post';
        $view->render($this->pageData);
    }

    public function showRoles(){
        $view = new View('roles');
        $manager = new UserManager();
        $this->pageData['users'] = $manager->list();
        $this->pageData['pageTitle'] = 'Blog-OC - Admin Users';
        $view->render($this->pageData);
    }

    public function createPost(){
        $view = new View();
        $goodExt = array('.png', '.gif', '.jpg', '.jpeg');
        $ext = strrchr($_FILES['image']['name'], '.');
        if(!in_array($ext, $goodExt)) {
            throw new \Exception('Wrong File Ext', 500);
        }
        $filename = uniqid('image').$ext;
        if(!move_uploaded_file($_FILES['image']['tmp_name'], UPLOADS.$filename)){
            throw new \Exception('Upload Failed', 500);
        }
        $post = new Post();
        $post->setTitle($this->request->input('title'));
        $post->setSubtitle($this->request->input('subtitle'));
        $post->setImage($filename);
        $post->setImageDescr($this->request->input('imagedescr'));
        $post->setContent($this->request->input('content'));
        $post->setCreaDate(new \DateTimeImmutable());
        $post->setEditDate(new \DateTimeImmutable());
        $post->setAuthor($this->pageData['loggedUser']);

        $manager = new PostManager;
        $id = $manager->createPost($post);
        if(!$id){
            throw new \Exception('Post Creation Failed', 500);
        }
        $view->redirect('post/'.$id);
    }

    public function commentValidation(){
        $view = new View('commentvalidate');
        $manager = new CommentManager();
        $this->pageData['comments'] = $manager->getNotValidated();
        $this->pageData['pageTitle'] = 'Blog-OC - Admin Comments';
        $view->render($this->pageData);
    }

    public function commentList(){
        $view = new View('commentlist');
        $manager = new CommentManager();
        $this->pageData['comments'] = $manager->getAll();
        $this->pageData['pageTitle'] = 'Blog-OC - Admin Comments';
        $view->render($this->pageData);
    }

    public function validateComment(){
        $manager = new CommentManager();
        $manager->validateComment($this->request->input('id'));
        $view = new View();
        $view->redirect('admin-validate');
    }

    public function promoteUser(){
        $manager = new UserManager();
        $manager->promoteUser($this->request->input('id'));
        $view = new View();
        $view->redirect('admin-roles');
    }

    public function downgradeUser(){
        $manager = new UserManager();
        $manager->downgradeUser($this->request->input('id'));
        $view = new View();
        $view->redirect('admin-roles');
    }
}
