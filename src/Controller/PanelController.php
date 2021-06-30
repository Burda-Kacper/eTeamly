<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanelController extends AbstractController
{
    public function index(){
        return $this->render("panel/panel.html.twig");
    }
}
