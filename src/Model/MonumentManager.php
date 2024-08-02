<?php

/**
 * Manager des monuments (PHP Doc)
 */

namespace App\Model;

use Exception;     // Pour classes qui ne ne se trouvent pas dans le même Namespace 
use PDO;          // Pour classes qui ne ne se trouvent pas dans le même Namespace
use App\Database;


class MonumentManager {

    //MÉTHODE READ
    public static function getAll() : array {
        $db = Database::getConnection();
        $stmt = $db->query('SELECT * FROM monument');
       return $stmt->fetchAll(PDO::FETCH_CLASS, Monument::class);
    }

    public static function getOne(int $monumentId) : Monument {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM monument WHERE id = ?');
        $stmt->execute([$monumentId]);
        $monument = $stmt->fetchObject(Monument::class);

        if($monument == false){
            throw new Exception("Monument non trouvé");
        } else {
            return $monument;
        }
    }
 
    //MÉTHODE CREATE
    public static function create(Monument $monument) : void {
        $db = Database::getConnection();
        $stmt = $db->prepare('INSERT INTO monument (nom, pays, ville, nbVisitesAn) VALUES (?, ?, ?, ?)');
        $stmt->execute([$monument->getNom(), $monument->getPays(), $monument->getVille(), $monument->getNbVisitesAn()]);
    }

    //MÉTHODE UPDATE
    public static function update(Monument $monument) : void {
        $db = Database::getConnection();
        $stmt = $db->prepare('UPDATE monument SET nom = ?, pays = ?, ville = ?, nbVisitesAn = ? WHERE id = ?');
        $stmt->execute([$monument->getNom(), $monument->getPays(), $monument->getVille(), $monument->getNbVisitesAn(), $monument->getId()]);
    }

    //MÉTHODE DELETE
    public static function delete(Monument $monument) : void {
        $db = Database::getConnection();
        $stmt = $db->prepare('DELETE FROM monument WHERE id = ?');
        $stmt->execute([$monument->getId()]);
    }

}
