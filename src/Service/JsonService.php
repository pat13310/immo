<?php
// src/Service/JsonService.php

namespace App\Service;

class JsonService
{
    public function getDataFromJsonFile($filePath)
    {
        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);
        return $data;
    }

    public function getCountries($filePath){
        $jsonContent = file_get_contents($filePath);
        $jsonData = json_decode($jsonContent, true);
        $data=[];
        foreach ($jsonData as $countryData) {
            // Effectuez des actions avec les données de chaque pays
            $name = $countryData['name'];
            $indicatif = $countryData['indicatif'];
            //$code = $countryData['code'];
            $data[$name]=$indicatif;            
        }        
        return $data;
    }
}
