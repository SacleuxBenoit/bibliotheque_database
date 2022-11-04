<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\User;
use App\Entity\Emprunteur;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TestFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->loadUser($manager);
        $this->loadEmprunteur($manager);

        $manager->flush();
    }

    public function loadUser(ObjectManager $manager) :void{
        $userDatas = [
            [
                "email" => "admin@example.com",
                "roles" => "ROLE_ADMIN",
                "password" => "2y/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K",
                "enabled" => true,
                "created_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-01-01 09:00:00'),
                "updated_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-01-01 09:00:00'),
            ],
            [
                "email" => "foo.foo@example.com",
                "roles" => "ROLE_EMRUNTEUR",
                "password" => "2y/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K",
                "enabled" => true,
                "created_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-01-01 10:00:00'),
                "updated_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-01-01 10:00:00'),
            ],
            [
                "email" => "bar.bar@example.com",
                "roles" => "ROLE_EMRUNTEUR",
                "password" => "2y/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K",
                "enabled" => false,
                "created_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-02-01 11:00:00'),
                "updated_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-05-01 12:00:00'),
            ],
            [
                "email" => "baz.baz@example.com",
                "roles" => "ROLE_EMRUNTEUR",
                "password" => "2y/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K",
                "enabled" => true,
                "created_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-03-01 12:00:00'),
                "updated_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-03-01 12:00:00'),
            ]
        ];

        foreach ($userDatas as $userData){
            $user = new User();
            $user->setEmail($userData['email']);
            $user->setRoles($userData['roles']);
            $user->setPassword($userData['password']);
            $user->setEnabled($userData['enabled']);
            $user->setCreatedAt($userData['created_at']);
            $user->setUpdatedAt($userData['updated_at']);

            $manager->persist($user);
        }
    }

    public function loadEmprunteur(ObjectManager $manager):void{
        $emprunteurDatas = [
            [
                "nom" => "foo",
                "prenom" => "foo",
                "tel" => "123456789",
                "actif" => true,
                "created_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-01-01 10:00:00'),
                "updated_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-01-01 10:00:00'),
            ],
            [
                "nom" => "bar",
                "prenom" => "bar",
                "tel" => "123456789",
                "actif" => false,
                "created_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-02-01 11:00:00'),
                "updated_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-05-01 12:00:00'),
            ],
            [
                "nom" => "baz",
                "prenom" => "baz",
                "tel" => "123456789",
                "actif" => true,
                "created_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-03-01 12:00:00'),
                "updated_at" => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2020-03-01 12:00:00'),
            ]
        ];
        foreach ($emprunteurDatas as $emprunteurData){
            $emprunteur = new Emprunteur();

            $emprunteur->setNom($emprunteurData['nom']);
            $emprunteur->setPrenom($emprunteurData['prenom']);
            $emprunteur->setTel($emprunteurData['tel']);
            $emprunteur->setActif($emprunteurData['actif']);
            $emprunteur->setCreatedAt($emprunteurData['created_at']);
            $emprunteur->setUpdatedAt($emprunteurData['updated_at']);

            $manager->persist($emprunteur);
        }
    }

    public function loadAuteur(ObjectManager $manager):void {
        $auteurDatas = [
            [
                'nom' => 'auteur inconnu',
                'prenom' => '',
            ],
            [
                'nom' => 'Cartier ',
                'prenom' => 'Hugues',
            ],
              [
                'nom' => 'Lambert',
                'prenom' => 'Armand',
            ],
            [
                'nom' => 'Moitessier',
                'prenom' => 'Thomas',
            ],
        ];

        foreach ($auteurDatas as $auteurData) {
            $auteur = new Auteur();
            $auteur->setNom($auteurData['nom']);
            $auteur->setPrenom($auteurData['prenom']);

            $manager->persist($auteur);
        }
    }
}
