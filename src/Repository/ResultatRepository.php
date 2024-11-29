<?php
namespace App\Repository;

use Doctrine\DBAL\Connection;

class ResultatRepository
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getResultatBilanGeneral(int $idEtudiant, int $idSemestre): array
    {
        $sql = "
            SELECT 
                e.*, m.idmatiere, m.nom as nom_matiere, m.code, m.credit, s.nom as nom_semestre, (sum(bg.note) / m.credit) as notes
            FROM 
                bilanGeneral bg
            inner JOIN 
                etudiant e ON bg.idEtudiant = e.idEtudiant
            inner JOIN 
                matiere m ON bg.idMatiere = m.idMatiere
            inner join semestre s on m.idsemestre = s.idsemestre
            WHERE e.idEtudiant = :idEtudiant and m.idsemestre = :idSemestre GROUP BY m.idMatiere, e.idetudiant, m.idmatiere, m.credit, s.idsemestre
        ";

        return $this->connection->fetchAllAssociative($sql, [
            'idEtudiant' => $idEtudiant,
            'idSemestre' => $idSemestre,
        ]);
    }
}
