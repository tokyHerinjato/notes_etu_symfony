<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use Doctrine\ORM\EntityManagerInterface;

class EtudiantController extends AbstractController
{
    #[Route("/api/etudiants", name: "liste", methods: ["GET"])]
    public function getAll(EntityManagerInterface $entityManager): Response
    {
        $etudiants = $entityManager->getRepository(Etudiant::class)->findAll();
        $data = [];
        foreach ($etudiants as $etudiant) {
            $data[] = [
                'idetudiant' => $etudiant->getIdEtudiant(),
                'nom' => $etudiant->getNom(),
                'prenom' => $etudiant->getPrenom(),
                'dtn' => $etudiant->getDtn()?->format('Y-m-d'),
                'etu' => $etudiant->getEtu(),
                'filiere' => $etudiant->getFiliere(),
            ];
        }
        $jsonContent = json_encode($data);
        $response = new Response(
            $jsonContent,
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
        return $response;
    }
}
?>