<?php 

namespace App\Model;    //logique PSR4
use Exception;      //ou via "CTRL + Espace" depuis la fin de la classe en question

/**
 * Classe des monuments (PHP Doc)
 */

class Monument {

    private int $id;
    private string $nom;
    private string $pays;
    private string $ville;
    private int $nbVisitesAn;

    //SUPPRESSION CONSTRUCT car en conflit avec PHP
    // public function __construct(int $id, string $nom, string $pays, string $ville, int $nbVisitesAn){
    //     $this->setId($id);
    //     $this->setNom($nom);
    //     $this->setPays($pays);
    //     $this->setVille($ville);
    //     $this->setNbVisitesAn($nbVisitesAn);
    // }

    //Fonction qui remplace le constructeur
    public function hydrate(string $nom, string $pays, string $ville, int $nbVisitesAn) {
        $this->setNom($nom);
        $this->setPays($pays);
        $this->setVille($ville);
        $this->setNbVisitesAn($nbVisitesAn);
    }

    public function getId() : int {
        return $this->id;
    }
    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getNom() : string {
        return $this->nom;
    }
    public function setNom(string $nom) : void {
        $this->nom = $nom;
    }

    public function getPays() : string {
        return $this->pays;
    }
    public function setPays(string $pays) : void {
        $this->pays = $pays;
    }

    public function getVille() : string {
        return $this->ville;
    }
    public function setVille(string $ville) : void {
        $this->ville = $ville;
    }


    // NBR VISITES ANNUELLES
    public function getNbVisitesAn() : int {
        return $this->nbVisitesAn;
    }
    public function setNbVisitesAn(int $nbVisitesAn) : void {
        if ($this->validateNbVisitesAn($nbVisitesAn)) {
            $this->nbVisitesAn = $nbVisitesAn;
        } else {
            throw new Exception('Le nombre de visites annuelles doit être supérieur à 0');
        }
    }

    //Validateur du setter
    public function validateNbVisitesAn(int $nbVisitesAn) : bool {
        return ($nbVisitesAn > 0);  // Retourne "true" si vrai et "false" sinon
    }

}
