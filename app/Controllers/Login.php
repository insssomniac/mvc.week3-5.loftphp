<?php
namespace App\Controllers;

use App\Models\User;
use Base\Controller;

class Login extends Controller
{
    public function index()
    {
        if ($this->getUser()) {
            $this->redirect('/blog');
        }
        return $this->view->render('base-login.html', ['title' => 'Yet Another Interesting Blog']);
    }

    public function authForm()
    {
        if ($this->getUser()) {
            $this->redirect('/blog');
        }
        return $this->view->renderTwig('auth.html', ['title' => 'Добро пожаловать снова!', 'user' => $this->getUser()]);
    }

    public function registerForm()
    {
        if ($this->getUser()) {
            $this->redirect('/blog');
        }
        return $this->view->renderTwig('register.html', ['title' => 'Простая регистрация', 'user' => $this->getUser()]);
    }

    public function auth()
    {
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];

        $user = User::where('email', '=', $email)->first();

        if (!$user) {
            return 'Неправильный логин или пароль';
        }

        if ($user->password !== User::getPasswordHash($password)) {
            return 'Неправильный логин или пароль';
        }

        $this->session->authUser($user->getId());
        $this->redirect('/blog');
    }

    public function register()
    {
        $name = (string) $_POST['name'];
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];
        $password2 = (string) $_POST['password_2'];

        if (!$name || !$password) {
            return 'Поля Имя и Пароль обязательны для заполнения';
        }

        if (!$email) {
            return 'Поле Email обязательно для заполнения';
        }

        if ($password !== $password2) {
            return 'Введенные пароли не совпадают';
        }

        if (mb_strlen($password) < 5) {
            return 'Необходимо ввести пароль, содержащий более 5 символов';
        }

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = $user::getPasswordHash($password);
        $user->sendRegistrationEmail();
        $user->save();

        $this->session->authUser($user->getId());
        $this->redirect('/blog');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}