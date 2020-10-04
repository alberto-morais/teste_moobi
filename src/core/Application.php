<?php


namespace App\core;


class Application
{

    protected $view;
    public $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session =& $_SESSION;
    }

    public function get_flash($mix):array
    {
        return $this->session['flash'];
    }

    public function flash($mix):void
    {

        $this->session['init'] = 1;
        $this->session['flash'][array_key_first($mix)] = $mix;
    }




}