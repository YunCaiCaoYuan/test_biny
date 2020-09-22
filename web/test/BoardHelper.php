<?php
namespace app\controller;

class BoardHelper extends baseAction
{
    public function check_login() {
        $this->testDAO->query();
    }

}