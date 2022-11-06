<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use App\Entity\Genre;
use App\Entity\Auteur;
use App\Entity\User;
use App\Entity\Emprunteur;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;


class TestFixtures extends Fixture
{
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->loadUser($manager);
        $this->loadEmprunteur($manager);
        $this->loadGenre($manager);
        $this->loadLivre($manager);

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

    public function loadGenre(ObjectManager $manager): void{
        $genreDatas =
            [
                [
                    "nom" => "poésie",
                    "description" => null,
                ],
                [
                    "nom" => "nouvelle",
                    "description" => null,
                ],
                [
                    "nom" => "roman historique",
                    "description" => null,
                ],
                [
                    "nom" => "roman d'amour",
                    "description" => null,
                ],
                [
                    "nom" => "roman d'aventure",
                    "description" => null,
                ],
                [
                    "nom" => "science-fiction",
                    "description" => null,
                ],
                [
                    "nom" => "fantasy",
                    "description" => null,
                ],
                [
                    "nom" => "biographie",
                    "description" => null,
                ],
                [
                    "nom" => "conte",
                    "description" => null,
                ],
                [
                    "nom" => "témoignage",
                    "description" => null,
                ],
                [
                    "nom" => "théâtre",
                    "description" => null,
                ],
                [
                    "nom" => "essai",
                    "description" => null,
                ],
                [
                    "nom" => "journal intime",
                    "description" => null,
                ],
            ];

        foreach ($genreDatas as $genreData) {
            $genre = new Genre();
            $genre->setNom($genreData["nom"]);
            $genre->setDescription($genreData['description']);

            $manager->persist($genre);
        }

        $manager->flush();
    }
    public function loadLivre(ObjectManager $manager): void{

        $livreDatas = [
            [
                'titre' => 'Lorem ipsum dolor sit amet',
                'anne_edition' => 2010,
                'nombre_pages' => 100,
                'code_isbn' => '9785786930024',
            ],
            [
                'titre' => 'Consectetur adipiscing elit',
                'anne_edition' => 2011,
                'nombre_pages' => 150,
                'code_isbn' => '9783817260935',
            ],
            [
                'titre' => 'Mihi quidem Antiochum',
                'anne_edition' => 2012,
                'nombre_pages' => 200,
                'code_isbn' => '9782020493727',
            ],
            [
                'titre' => 'Quem audis satis belle ',
                'anne_edition' => 2013,
                'nombre_pages' => 250,
                'code_isbn' => '9794059561353',
            ],
        ];

        foreach ($livreDatas as $livreData) {
            $livre = new Livre();
            $livre->setTitre($livreData['titre']);
            $livre->setAnneeEdition($livreData['anne_edition']);
            $livre->setNombresPages($livreData['nombre_pages']);
            $livre->setCodeIsbn($livreData['code_isbn']);

            $manager->persist($livre);
        }
    }
}
