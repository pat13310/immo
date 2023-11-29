<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher){

    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $mails = [
            "p-garcia@laposte.com", 
            "admin@xen.com",
            "compta@xen.com", 
            "user1@xen.com",
            "user2@xen.com",
            "user3@xen.com",
            "user4@xen.com",
            "user5@xen.com",
            "user6@xen.com",
            "user7@xen.com",
            "user8@xen.com",


        ];
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user
                ->setEmail($mails[$i])
                //->setPassword(password_hash('password', PASSWORD_BCRYPT)) // Set a default password for simplicity
                ->setPassword(
                    $this->userPasswordHasher->hashPassword(
                        $user,
                        'password'
                    )
                )
                ->setRoles(['ROLE_USER'])
                ->setFirstname($faker->firstName)
                ->setName($faker->lastName)
                ->setPhone($faker->phoneNumber)
                // ... Ajoutez d'autres propriétés si nécessaire
            ;
            $manager->persist($user);
        }
        $manager->flush();
    }
}
