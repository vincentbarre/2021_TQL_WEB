<?php

class View
{
    protected $route;
    protected $data;

    public function __construct($route)
    {
        $this->route = $route;

    }

    public function display()
    {
        $vue = "../app/view/" . $this->route['controller'] . "/" . $this->route['action'] . ".php";

        if (file_exists ($vue)) {
            include ($vue);
        }

    }

    public function setData($data)
    {

        $this->data = $data;

    }

}