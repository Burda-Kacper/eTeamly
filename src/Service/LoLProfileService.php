<?php

namespace App\Service;

use App\Entity\LoLProfile;
use App\Entity\User;
use App\Repository\LoLProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\LoLApiService;

class LoLProfileService
{

    private $prefix = "ET";
    private $loLProfileRepo;
    private $em;
    private $apiService;

    public function __construct(LoLProfileRepository $loLProfileRepo, EntityManagerInterface $em, LoLApiService $apiService)
    {
        $this->loLProfileRepo = $loLProfileRepo;
        $this->em = $em;
        $this->apiService = $apiService;
    }

    public function generateIKP(User $user, LoLProfile $foundLoLProfile = null): array
    {

        $IKP = $this->prefix . strtoupper(substr(str_shuffle(MD5(microtime())), 0, 15));

        $foundLoLProfile = $this->loLProfileRepo->findOneBy([
            'owner' => $user
        ]);
        if (!$foundLoLProfile) {
            $foundLoLProfile = new LoLProfile();
            $foundLoLProfile->setOwner($user);
        }
        $foundLoLProfile->setIKP($IKP);

        $this->em->persist($foundLoLProfile);
        $this->em->flush();

        return [
            'success' => true,
            'data' => $foundLoLProfile->getIKP()
        ];
    }

    public function verifySummoner(User $user, string $summonerName): array
    {
        $summonerApiData = $this->apiService->fetchSummonerBasicData($summonerName);
        if (!$summonerApiData) {
            return [
                'success' => false,
                'data' => "Nie znaleziono przywoływacza z podaną nazwą."
            ];
        }

        $foundLoLProfile = $this->loLProfileRepo->findOneBy([
            'owner' => $user
        ]);
        if (!$foundLoLProfile) {
            return [
                'success' => false,
                'data' => "Najpierw wygeneruj IKP i wykonaj krok 3."
            ];
        }

        $clientIKP = $this->apiService->fetchClientIKP($summonerApiData['id']);
        $appIKP = $foundLoLProfile->getIKP();
        if (!$clientIKP) {
            return [
                'success' => false,
                'data' => "Najpierw wprowadź IKP w kliencie League of Legends."
            ];
        }
        if ($clientIKP !== $appIKP) {
            return [
                'success' => false,
                'data' => "IKP na eTeamly i IKP w kliencie nie są zgodne."
            ];
        }

        $foundLoLProfile->setVerified(true);
        $foundLoLProfile->setSummonerName($summonerApiData['name']);
        $this->em->persist($foundLoLProfile);
        $this->em->flush();

        return [
            'success' => true,
            'data' => "Konta zostały pomyślnie połączone."
        ];
    }
}
