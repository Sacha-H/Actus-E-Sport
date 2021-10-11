<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreArticle;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaireArticle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoArticle;

    /**
     * @ORM\Column(type="date")
     */
    private $dateArticle;

    /**
     * @ORM\ManyToOne(targetEntity=Esport::class, inversedBy="article")
     */
    private $esport;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="article")
     */
    private $equipe = null;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="article")
     */
    private $joueur;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="article")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $views;

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreArticle(): ?string
    {
        return $this->titreArticle;
    }

    public function setTitreArticle(string $titreArticle): self
    {
        $this->titreArticle = $titreArticle;

        return $this;
    }

    public function getCommentaireArticle(): ?string
    {
        return $this->commentaireArticle;
    }

    public function setCommentaireArticle(string $commentaireArticle): self
    {
        $this->commentaireArticle = $commentaireArticle;

        return $this;
    }

    public function getPhotoArticle(): ?string
    {
        return $this->photoArticle;
    }

    public function setPhotoArticle(string $photoArticle): self
    {
        $this->photoArticle = $photoArticle;

        return $this;
    }

    public function getDateArticle(): ?\DateTimeInterface
    {
        return $this->dateArticle;
    }

    public function setDateArticle(\DateTimeInterface $dateArticle): self
    {
        $this->dateArticle = $dateArticle;

        return $this;
    }

    public function getEsport(): ?Esport
    {
        return $this->esport;
    }

    public function setEsport(?Esport $esport): self
    {
        $this->esport = $esport;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

        return $this;
    }


}
