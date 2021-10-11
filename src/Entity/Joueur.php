<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
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
    private $pseudoJoueur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomJoueur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomJoueur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoJoueur;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="joueur")
     */
    private $equipe;

    /**
     * @ORM\ManyToOne(targetEntity=Esport::class, inversedBy="joueur")
     */
    private $esport;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="joueur")
     */
    private $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudoJoueur(): ?string
    {
        return $this->pseudoJoueur;
    }

    public function setPseudoJoueur(string $pseudoJoueur): self
    {
        $this->pseudoJoueur = $pseudoJoueur;

        return $this;
    }

    public function getNomJoueur(): ?string
    {
        return $this->nomJoueur;
    }

    public function setNomJoueur(string $nomJoueur): self
    {
        $this->nomJoueur = $nomJoueur;

        return $this;
    }

    public function getPrenomJoueur(): ?string
    {
        return $this->prenomJoueur;
    }

    public function setPrenomJoueur(string $prenomJoueur): self
    {
        $this->prenomJoueur = $prenomJoueur;

        return $this;
    }

    public function getPhotoJoueur(): ?string
    {
        return $this->photoJoueur;
    }

    public function setPhotoJoueur(string $photoJoueur): self
    {
        $this->photoJoueur = $photoJoueur;

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

    public function getEsport(): ?Esport
    {
        return $this->esport;
    }

    public function setEsport(?Esport $esport): self
    {
        $this->esport = $esport;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setJoueur($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getJoueur() === $this) {
                $article->setJoueur(null);
            }
        }

        return $this;
    }
}
