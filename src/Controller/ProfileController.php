<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    public function index(){
        return $this->render("panel/profile/profile.html.twig");
    }
    public function connect(){
        return $this->render("panel/profile/connect.html.twig");
    }
}
