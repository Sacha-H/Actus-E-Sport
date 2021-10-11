<?php

namespace App\Entity;

use App\Repository\EsportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EsportRepository::class)
 */
class Esport
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
    private $nomEsport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoEsport;

    /**
     * @ORM\OneToMany(targetEntity=Equipe::class, mappedBy="esport")
     */
    private $equipe;

    /**
     * @ORM\OneToMany(targetEntity=Joueur::class, mappedBy="esport")
     */
    private $joueur;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="esport")
     */
    private $article;

    public function __construct()
    {
        $this->equipe = new ArrayCollection();
        $this->joueur = new ArrayCollection();
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEsport(): ?string
    {
        return $this->nomEsport;
    }

    public function setNomEsport(string $nomEsport): self
    {
        $this->nomEsport = $nomEsport;

        return $this;
    }

    public function getPhotoEsport(): ?string
    {
        return $this->photoEsport;
    }

    public function setPhotoEsport(string $photoEsport): self
    {
        $this->photoEsport = $photoEsport;

        return $this;
    }

    /**
     * @return Collection|Equipe[]
     */
    public function getEquipe(): Collection
    {
        return $this->equipe;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->equipe->contains($equipe)) {
            $this->equipe[] = $equipe;
            $equipe->setEsport($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        if ($this->equipe->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getEsport() === $this) {
                $equipe->setEsport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Joueur[]
     */
    public function getJoueur(): Collection
    {
        return $this->joueur;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->joueur->contains($joueur)) {
            $this->joueur[] = $joueur;
            $joueur->setEsport($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        if ($this->joueur->removeElement($joueur)) {
            // set the owning side to null (unless already changed)
            if ($joueur->getEsport() === $this) {
                $joueur->setEsport(null);
            }
        }

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
            $article->setEsport($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getEsport() === $this) {
                $article->setEsport(null);
            }
        }

        return $this;
    }
}
