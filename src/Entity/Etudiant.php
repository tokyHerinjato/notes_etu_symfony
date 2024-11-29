<?php  

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "Etudiant")]
class Etudiant {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $idetudiant;

    #[ORM\Column(type: "string", length: 50)]
    private string $nom;
    
    #[ORM\Column(type: "string", length: 50)]
    private string $prenom;
    
    #[ORM\Column(type: "date")]
    private \DateTime $dtn;

    #[ORM\Column(type: "string", length: 50)]
    private string $etu;

    #[ORM\Column(type: "string", length: 50)]
    private string $filiere;

    // Getters and Setters

    public function getIdetudiant(): int {
        return $this->idetudiant;
    }

    public function setIdetudiant(int $idetudiant): self {
        $this->idetudiant = $idetudiant;
        return $this;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self {
        $this->prenom = $prenom;
        return $this;
    }

    public function getDtn(): \DateTime {
        return $this->dtn;
    }

    public function setDtn(\DateTime $dtn): self {
        $this->dtn = $dtn;
        return $this;
    }

    public function getEtu(): string {
        return $this->etu;
    }

    public function setEtu(string $etu): self {
        $this->etu = $etu;
        return $this;
    }

    public function getFiliere(): string {
        return $this->filiere;
    }

    public function setFiliere(string $filiere): self {
        $this->filiere = $filiere;
        return $this;
    }
}

?>
