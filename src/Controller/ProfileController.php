<?php

namespace App\Controller;

use App\Service\LoLProfileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    public function index()
    {
        return $this->render("panel/profile/profile.html.twig");
    }
    public function connect()
    {
        return $this->render("panel/profile/connect.html.twig");
    }
    public function generateIKP(LoLProfileService $loLProfileService)
    {
        $user = $this->getUser();
        if ($user) {
            return new JsonResponse($loLProfileService->generateIKP($user));
        }
        return new JsonResponse([
            'success' => false,
            'data' => "Najpierw się zaloguj."
        ]);
    }

    public function verifySummoner(Request $request, LoLProfileService $loLProfileService)
    {
        $user = $this->getUser();
        if ($user) {
            return new JsonResponse($loLProfileService->verifySummoner($user, $request->get('summoner')));
        }
        return new JsonResponse([
            'success' => false,
            'data' => "Najpierw się zaloguj."
        ]);
    }
}
