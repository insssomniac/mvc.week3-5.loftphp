<?php
namespace Base;

use App\Models\User;

abstract class Controller
{
    /** @var View */
    protected $view;
    /** @var Session */
    protected $session;

    public function setView($view)
    {
        $this->view = $view;
    }

    public function setSession($session)
    {
        $this->session = $session;
    }

    public function getUser()
    {
        $userId = $this->session->getUserId();
        if (!$userId) {
            return null;
        }

        $user = User::find($userId);

        return $user;
    }

    public function redirect(string $url)
    {
        throw new RedirectException($url);
    }

    public function preDispatch()
    {

    }
}