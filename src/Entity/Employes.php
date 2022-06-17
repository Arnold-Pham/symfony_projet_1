<?php

namespace App\Entity;


use App\Repository\EmployesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    //  Vérifications variable prénom 
    //  longueur entre 2 et 255 caractères
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: "Le prénom doit contenir au minimum {{ limit }} lettres.",
        maxMessage: "Le prénom doit contenir au maximum {{ limit }} lettres."
    )]
    private $prenom;

    //  Vérifications variable nom
    //  longueur entre 2 et 255 caractères
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: "Le nom doit contenir au minimum {{ limit }} lettres.",
        maxMessage: "Le nom doit contenir au maximum {{ limit }} lettres."
    )]
    private $nom;

    //  Vérifications variable telephone
    //  longueur 10 chiffres
    //  Numéro étant un nombre positif et commencant obligatoirement par 0
    #[ORM\Column(type: 'string', length: 10)]
    #[Assert\Regex(pattern: "/^[0-9]+$/")]
    #[Assert\Length(
        min: 10,
        max: 10,
        exactMessage: "Le numéro doit contenir {{ limit }} chiffres."
    )]
    #[Assert\PositiveOrZero]
    #[Assert\LessThan(
        value: 1_000_000_000,
        message: "Format de numéro invalide."
    )]
    private $telephone;

    //  Vérifications variable email
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Email(message: "L'email n'est pas valide")]
    private $email;

    //  Vérifications variable adresse
    //  longueur entre 10 et 255 caractères
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: 10,
        max: 255,
        minMessage: "L'adresse doit contenir au minimum {{ limit }} caractères.",
        maxMessage: "L'adresse doit contenir au maximum {{ limit }} caractères."
    )]
    private $adresse;

    //  Vérifications variable poste
    //  longueur entre 2 et 255 caractères
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: "Le poste doit contenir au minimum {{ limit }} caractères.",
        maxMessage: "Le poste doit contenir au maximum {{ limit }} caractères."
    )]
    private $poste;

    //  Vérifications variable salaire
    //  Elément ne permettant que l'écriture de chiffres
    //  longueur entre 1 et 10 chiffres
    //  Salaire positif inférieur ou égal à un million
    #[ORM\Column(type: 'string', length: 10)]
    #[Assert\Regex(pattern: "/^[0-9]+$/")]
    #[Assert\Length(
        min: 1,
        max: 10,
        minMessage: "Le salaire doit avoir au minimum {{ limit }} chiffre.",
        maxMessage: "Le salaire doit avoir au maximum {{ limit }} chiffres."
    )]
    #[Assert\PositiveOrZero]
    #[Assert\LessThanOrEqual(
        value: 1_000_000,
        message: "Salaire trop élevé."
    )]
    private $salaire;

    //  Vérifications variable datedenaissance
    //  Obligatoirement une date
    //  L'employé doit être agé d'au moins 18 ans, et au plus 100 ans.
    #[ORM\Column(type: 'date')]
    #[Assert\Type(
        type: "datetime",
        message: "{{ value }} invalide."
    )]
    #[Assert\LessThanOrEqual(
        value: "-18 years",
        message: "L'employé doit être majeur."
    )]
    #[Assert\GreaterThanOrEqual(
        value: "-100 years",
        message: "L'employé doit avoir moins de 100 ans."
    )]
    private $datedenaissance;

    // ============================================================================================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire(string $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
}
