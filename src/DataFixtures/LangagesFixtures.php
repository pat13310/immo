<?php
// src/DataFixtures/LangagesFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Langages;

class LangagesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $langagesData = [
            [
                'name' => 'Français',
                'country' => 'France',
                'isFavorite' => true,
            ],
            [
                'name' => 'English',
                'country' => 'United States',
                'isFavorite' => true,
            ],
            [
                'name' => 'English',
                'country' => 'United Kingdom',
                'isFavorite' => true,
            ],
            [
                'name' => 'Azərbaycan dili',
                'country' => 'Azərbaycan',
                'isFavorite' => false,
            ],
            [
                'name' => 'Bahasa Indonesia',
                'country' => 'Indonesia',
                'isFavorite' => false,
            ],
            [
                'name' => 'Bosanski',
                'country' => 'Bosna i Hercegovina',
                'isFavorite' => false,
            ],
            [
                'name' => 'Català',
                'country' => 'Espanya',
                'isFavorite' => false,
            ],
            [
                'name' => 'Čeština',
                'country' => 'Česká republika',
                'isFavorite' => false,
            ],
            [
                'name' => 'Crnogorski',
                'country' => 'Crna Gora',
                'isFavorite' => false,
            ],
            [
                'name' => 'Dansk',
                'country' => 'Danmark',
                'isFavorite' => false,
            ],
            [
                'name' => 'Deutsch',
                'country' => 'Deutschland',
                'isFavorite' => false,
            ],
            [
                'name' => 'Deutsch',
                'country' => 'Österreich',
                'isFavorite' => false,
            ],
            [
                'name' => 'Deutsch',
                'country' => 'Schweiz',
                'isFavorite' => false,
            ],
            [
                'name' => 'Deutsch',
                'country' => 'Luxemburg',
                'isFavorite' => false,
            ],
            [
                'name' => 'Eesti',
                'country' => 'Eesti',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'Australia',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'Canada',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'Guyana',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'India',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'Ireland',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'New Zealand',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'Singapore',
                'isFavorite' => false,
            ],
            [
                'name' => 'English',
                'country' => 'United Arab Emirates',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Argentina',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Belice',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Bolivia',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Chile',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Colombia',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Costa Rica',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Ecuador',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'El Salvador',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'España',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Estados Unidos',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Guatemala',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Honduras',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Latinoamérica',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'México',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Nicaragua',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Panamá',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Paraguay',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Perú',
                'isFavorite' => false,
            ],
            [
                'name' => 'Español',
                'country' => 'Venezuela',
                'isFavorite' => false,
            ],
            [
                'name' => 'Français',
                'country' => 'Belgique',
                'isFavorite' => false,
            ],
            [
                'name' => 'Français',
                'country' => 'Canada',
                'isFavorite' => false,
            ],
            [
                'name' => 'Français',
                'country' => 'Suisse',
                'isFavorite' => false,
            ],
            [
                'name' => 'Français',
                'country' => 'Luxembourg',
                'isFavorite' => false,
            ],
            [
                'name' => 'Gaeilge',
                'country' => 'Éire',
                'isFavorite' => false,
            ],
            [
                'name' => 'Hrvatski',
                'country' => 'Hrvatska',
                'isFavorite' => false,
            ],
            [
                'name' => 'isiXhosa',
                'country' => 'eMzantsi Afrika',
                'isFavorite' => false,
            ],
            [
                'name' => 'isiZulu',
                'country' => 'iNingizimu Afrika',
                'isFavorite' => false,
            ],
            [
                'name' => 'Íslenska',
                'country' => 'Ísland',
                'isFavorite' => false,
            ],
            [
                'name' => 'Italiano',
                'country' => 'Italia',
                'isFavorite' => false,
            ],
            [
                'name' => 'Italiano',
                'country' => 'Svizzera',
                'isFavorite' => false,
            ],
            [
                'name' => 'Kiswahili',
                'country' => 'Āfrika',
                'isFavorite' => false,
            ],
            [
                'name' => 'Latviešu',
                'country' => 'Latvija',
                'isFavorite' => false,
            ],
            [
                'name' => 'Lietuvių',
                'country' => 'Lietuva',
                'isFavorite' => false,
            ],
            [
                'name' => 'Magyar',
                'country' => 'Magyarország',
                'isFavorite' => false,
            ],
            [
                'name' => 'Malti',
                'country' => 'Malta',
                'isFavorite' => false,
            ],
            [
                'name' => 'Melayu',
                'country' => 'Malaysia',
                'isFavorite' => false,
            ],
            [
                'name' => 'Nederlands',
                'country' => 'België',
                'isFavorite' => false,
            ],
            [
                'name' => 'Nederlands',
                'country' => 'Nederland',
                'isFavorite' => false,
            ],
            [
                'name' => 'Norsk',
                'country' => 'Norge',
                'isFavorite' => false,
            ],
            [
                'name' => 'Polski',
                'country' => 'Polska',
                'isFavorite' => false,
            ],
            [
                'name' => 'Português',
                'country' => 'Brasil',
                'isFavorite' => false,
            ],
            [
                'name' => 'Português',
                'country' => 'Portugal',
                'isFavorite' => false,
            ],
            [
                'name' => 'Română',
                'country' => 'România',
                'isFavorite' => false,
            ],
            [
                'name' => 'Shqip',
                'country' => 'Shqipëri',
                'isFavorite' => false,
            ],
            [
                'name' => 'Slovenčina',
                'country' => 'Slovensko',
                'isFavorite' => false,
            ],
            [
                'name' => 'Slovenščina',
                'country' => 'Slovenija',
                'isFavorite' => false,
            ],
            [
                'name' => 'Srpski',
                'country' => 'Srbija',
                'isFavorite' => false,
            ],
            [
                'name' => 'Suomi',
                'country' => 'Suomi',
                'isFavorite' => false,
            ],
            [
                'name' => 'Svenska',
                'country' => 'Sverige',
                'isFavorite' => false,
            ],
            [
                'name' => 'Tagalog',
                'country' => 'Pilipinas',
                'isFavorite' => false,
            ],
            [
                'name' => 'Tiếng Việt',
                'country' => 'Việt Nam',
                'isFavorite' => false,
            ],
            [
                'name' => 'Türkçe',
                'country' => 'Türkiye',
                'isFavorite' => false,
            ],
            [
                'name' => 'Polska',
                'country' => 'Polski',
                'isFavorite' => false,
            ],
            // Fin du jeu de données
        ];

        foreach ($langagesData as $langageData) {
            $langage = new Langages();
            $langage->setName($langageData['name']);
            $langage->setCountry($langageData['country']);
            $langage->setIsFavorite($langageData['isFavorite']);
            $manager->persist($langage);
        }

        $manager->flush();
    }
}
