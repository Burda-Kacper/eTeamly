<?php

namespace App\Service;

use Exception;

class LoLApiService
{
    private string $apiKey;

    public function __construct()
    {
        // ETODO: Replace this key with .env variable. For now this api key is dev only with 24h lifespan so whatever
        $this->apiKey = "RGAPI-dc3496da-c74d-4381-a7d6-ba155850e880";
    }

    public function fetchSummonerBasicData(string $summonerName)
    {

        $url = "https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/" . urlencode($summonerName) . "?api_key=" . $this->apiKey . "";
        try {
            $data = $this->getEncodedData($url);
        } catch (Exception $e) {
            return false;
        }
        if ($data) {
            return $data;
        }
        return false;
    }

    public function fetchClientIKP(string $encryptedSummonerId)
    {
        $url = "https://eun1.api.riotgames.com/lol/platform/v4/third-party-code/by-summoner/" . urlencode($encryptedSummonerId) . "?api_key=" . $this->apiKey . "";
        try {
            $data = $this->getEncodedData($url);
        } catch (Exception $e) {
            return false;
        }
        if ($data) {
            return $data;
        }
        return false;
    }

    private function getEncodedData(string $url)
    {
        return json_decode(file_get_contents($url), true);
    }
}
