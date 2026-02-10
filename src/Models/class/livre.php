<?php

include_once dirname(__DIR__) . '/Models/Database.php';

class Livre
{
    private ?string $id;
    private ?string $db;
    private ?string $titre;
    private ?string $auteur_id;
    private ?string $categorie_id;
    private ?int $annee_publication;
    private ?string $isbn;
    private ?bool $dispononible;
    private ?string $synopsis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDb(): ?string
    {
        return $this->db;
    }
    public function setDb(?string $db): void
    {
        $this->db = $db;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }
    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }

    public function getAuteur_id(): ?string
    {
        return $this->auteur_id;
    }
    public function setAuteur_id(?string $auteur_id): void
    {
        $this->auteur_id = $auteur_id;
    }
    public function getCategorie_id(): ?string
    {
        return $this->categorie_id;
    }
    public function setCategorie_id(?string $categorie_id): void
    {
        $this->categorie_id = $categorie_id;
    }
    public function getAnnee_publication(): ?string
    {
        return $this->annee_publication;
    }
    public function setAnnee_publication(?int $annee_publication): void
    {
        $this->annee_publication = $annee_publication;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }
    public function setIsbn(?string $isbn): void
    {
        $this->isbn = $isbn;
    }
    public function getDisponible(): ?bool
    {
        return $this->dispononible;
    }
    public function setDisponible(?string $dispononible): void
    {
        $this->dispononible = $dispononible;
    }
    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }
    public function setSynopsis(?string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }


    const TABLE_NAME = 'livres';
}
