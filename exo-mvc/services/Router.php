<?php

require 'controllers/UserController.php';

class Router {
    private UserController $uC;

    public function __construct()
    {
        $this->uc = new UserController();
    }

    public function checkRoute(string $route) : void
    {
        if($route === "users")
        {
            $this->uc->index();
        }

        else if($route === "user-create")
        {
            $this->uc->create();
        }

        else if($route == "user-edit")
        {
            $this->uc->edit();
        }

        else
        {
            $this->uc->index();
        }
    }
}