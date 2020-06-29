<?php
namespace App\Controllers;

use App\Models\Post;
use Base\Controller;

class Blog extends Controller
{
    public function index()
    {
        if (!$this->getUser()) {
            $this->redirect('/login');
        }

        $posts = Post::all()->take(20);

        return $this->view->renderTwig('blog.html', ['posts' => $posts, 'user' => $this->getUser()]);
    }

    public function createPost()
    {
        if (!$this->getUser()) {
            $this->redirect('/login');
        }

        $text = (string) $_POST['text'];
        if (!$text) {
            $this->error('Поле Текст обязательно для заполнения');
        }

        $title = (string) $_POST['title'];
        if (!$title) {
            $this->error('Поле Заголовок обязательно для заполнения');
        }

        $post = new Post;
        $post->title = $title;
        $post->text = $text;
        $post->author_id = $this->session->getUserId();

        if (isset($_FILES ['image']['tmp_name'])) {
            $post->loadFile($_FILES['image']['tmp_name']);
        }

        $post->save();
        $this->redirect('/blog');
    }

    private function error()
    {

    }
}
