<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Devise;

class DeviseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $devisesData = [
            [
                'name' => 'Euro',
                'notation' => 'EUR – €',
            ],
            [
                'name' => 'Baht thaïlandais',
                'notation' => 'THB – ฿',
            ],
            [
                'name' => 'Colon costaricain',
                'notation' => 'CRC – ₡',
            ],
            [
                'name' => 'Couronne danoise',
                'notation' => 'DKK – kr',
            ],
            [
                'name' => 'Couronne norvégienne',
                'notation' => 'NOK – kr',
            ],
            [
                'name' => 'Couronne suédoise',
                'notation' => 'SEK – kr',
            ],
            [
                'name' => 'Couronne tchèque',
                'notation' => 'CZK – Kč',
            ],
            [
                'name' => 'Dirham marocain',
                'notation' => 'MAD',
            ],
            [
                'name' => 'Dirham émirien',
                'notation' => 'AED – ﺩ.ﺇ',
            ],
            [
                'name' => 'Dollar américain',
                'notation' => 'USD – $',
            ],
            [
                'name' => 'Dollar australien',
                'notation' => 'AUD – $',
            ],
            [
                'name' => 'Dollar canadien',
                'notation' => 'CAD – $',
            ],
            [
                'name' => 'Dollar de Hong Kong',
                'notation' => 'HKD – $',
            ],
            [
                'name' => 'Dollar de Singapour',
                'notation' => 'SGD – $',
            ],
            [
                'name' => 'Dollar néo-zélandais',
                'notation' => 'NZD – $',
            ],
            [
                'name' => 'Forint hongrois',
                'notation' => 'HUF – Ft',
            ],
            [
                'name' => 'Franc suisse',
                'notation' => 'CHF',
            ],
            [
                'name' => 'Kuna croate',
                'notation' => 'HRK – kn',
            ],
            [
                'name' => 'Leu roumain',
                'notation' => 'RON – lei',
            ],
            [
                'name' => 'Lev bulgare',
                'notation' => 'BGN – лв.',
            ],
            [
                'name' => 'Livre sterling',
                'notation' => 'GBP – £',
            ],
            [
                'name' => 'Livre turque',
                'notation' => 'TRY – ₺',
            ],
            [
                'name' => 'Nouveau Shekel israélien',
                'notation' => 'ILS – ₪',
            ],
            [
                'name' => 'Nouveau dollar de Taïwan',
                'notation' => 'TWD – $',
            ],
            [
                'name' => 'Peso chilien',
                'notation' => 'CLP – $',
            ],
            [
                'name' => 'Peso colombien',
                'notation' => 'COP – $',
            ],
            [
                'name' => 'Peso mexicain',
                'notation' => 'MXN – $',
            ],
            [
                'name' => 'Peso philippin',
                'notation' => 'PHP – ₱',
            ],
            [
                'name' => 'Peso uruguayen',
                'notation' => 'UYU – $U',
            ],
            [
                'name' => 'Rand sud-africain',
                'notation' => 'ZAR – R',
            ],
            [
                'name' => 'Real brésilien',
                'notation' => 'BRL – R$',
            ],
            [
                'name' => 'Ringgit malais',
                'notation' => 'MYR – RM',
            ],
            [
                'name' => 'Riyal saoudien',
                'notation' => 'SAR – SR',
            ],
            [
                'name' => 'Roupie indienne',
                'notation' => 'INR – ₹',
            ],
            [
                'name' => 'Roupie indonésienne',
                'notation' => 'IDR – Rp',
            ],
            [
                'name' => 'Sol péruvien',
                'notation' => 'PEN – S/',
            ],
            [
                'name' => 'Won sud-coréen',
                'notation' => 'KRW – ₩',
            ],
            [
                'name' => 'Yen japonais',
                'notation' => 'JPY – ¥',
            ],
            [
                'name' => 'Yuan chinois',
                'notation' => 'CNY – ￥',
            ],
            [
                'name' => 'Zloty polonais',
                'notation' => 'PLN – zł',
            ],
        ];

        foreach ($devisesData as $deviseData) {
            $devise = new Devise();
            $devise->setName($deviseData['name']);
            $devise->setNotation($deviseData['notation']);
            $manager->persist($devise);
        }

        $manager->flush();
    }
}

