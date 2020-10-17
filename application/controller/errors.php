<?php

class Errors extends Controller
{
    public function index()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/errors/index.php';
        require 'application/views/_templates/footer.php';
    }
}
