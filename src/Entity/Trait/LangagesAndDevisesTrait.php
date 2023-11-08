<?php 
namespace App\Entity\Trait;

use App\Repository\LangagesRepository;
use App\Repository\DeviseRepository;

trait LangagesAndDevisesTrait {
   // protected $langagesRepository;
   // protected $deviseRepository;

    public function __construct(private LangagesRepository $langagesRepository,private DeviseRepository $deviseRepository) {
       // $this->langagesRepository = $langagesRepository;
       // $this->deviseRepository = $deviseRepository;
    }

    // Reste du trait inchangé
    public function getAllLangages() {
        $langages = $this->langagesRepository->findAllLangages();
        return $langages;
    }

    public function getFavoriteLangages() {
        $favorites = $this->langagesRepository->findFavorites();
        return $favorites;
    }

    public function getAllDevises() {
        $devises = $this->deviseRepository->findAll();
        return $devises;
    }
}
