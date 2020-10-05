<?php


namespace App\core;


use App\helpers\Message;

class Application
{

    protected $view;
    public $msg;
    public $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session =& $_SESSION;
        $this->msg = new  Message();
    }

    public function get_flash($mix):array
    {
        return $this->session['flash'];
    }

    public function flash($mix):void
    {
        $this->session['init'] = 1;
        $this->session['flash'] = $mix;
    }

    public function saveSessionMessage()
    {
        $this->session['init'] = 1;
        $this->session['flash'] = $this->msg->notification;
    }

}