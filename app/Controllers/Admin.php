<?php
namespace App\Controllers;

use App\Models\Post;
use App\Models\User;
use Base\Controller;
use http\Message;
use Illuminate\Database\Capsule\Manager as DB;

class Admin extends Controller
{
    public function preDispatch()
    {
        parent::preDispatch();
        if (!$this->getUser()){
            $this->redirect('/');
        }
    }

    public function deletePost()
    {
        $postId = (int) $_GET['id'];
        Post::deletePost($postId);
        $this->redirect('/blog');
    }

    public function users()
    {
        if (!$this->getUser()->isAdmin()) {
            $this->redirect('/');
        }

        $users = User::all();

        return $this->view->renderTwig('users.html', ['users' => $users, 'user' => $this->getUser()]);
    }

    public function deleteUser()
    {
        $userId = (int) $_GET['user_id'];
        User::deleteUser($userId);
        return $this->redirect('/admin/users');
    }

    public function deleteUserPosts()
    {
        $userId = (int) $_GET['user_id'];
        User::deletePosts($userId);
        return $this->redirect('/admin/users');
    }

}