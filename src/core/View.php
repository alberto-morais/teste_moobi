<?php

namespace App\core;

class View
{
    private $data = array();

    private $render = FALSE;

    private $session;

    public function view($template, $data = [])
    {
        $this->session = $_SESSION;
        try {
            $file = __DIR__ . '/../view/' . strtolower($template) . '.php';

            if (file_exists($file)) {
                $this->render = $file;
                $this->data = extract($data);
                include($this->render);
            } else {
                throw new customException('Template ' . $template . ' not found!');
            }
        }
        catch (customException $e) {
            echo $e->errorMessage();
        }
    }

}
?>