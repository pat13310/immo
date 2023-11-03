<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Property;
use DateTime;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();
        $cityNames = [
            'Arles',
            'Marseille',
            'Salon de provence',
            'Paris', 'Lyon',
            'Nice', 'Toulouse',
            'Toulon',
            'St Martin de Crau',
            'Aix en provence'
        ];

        foreach ($cityNames as $cityName) {
            $property = new Property();
            $property->setName($cityName); // Utilisez un nom de ville aléatoire ici
            $property->setType($faker->randomElement(['Particulier', 'Professionnel']));
            $property->setSrc('img' . $faker->numberBetween(1, 12) . '.jpeg');
            $property->setRating($faker->randomFloat(1, 1, 10));
            $property->setDate(new DateTime());
            $property->setPrice($faker->numberBetween(100, 2000));
            $property->setLocal($cityName);

            $manager->persist($property);
        }

        $manager->flush();
    }
}
