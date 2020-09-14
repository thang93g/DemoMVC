<?php


namespace App1\m;


class ScoreManager
{
    protected $scoreManager;

    public function __construct()
    {
        $sm = new DBConnect();
        $this->scoreManager = $sm->connect();
    }

}