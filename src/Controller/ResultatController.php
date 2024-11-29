<?php
namespace App\Controller;

use App\Repository\ResultatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ResultatController extends AbstractController
{
    #[Route("/api/resultat/{idEtudiant}/{idSemestre}", name: "resultat", methods: ["GET"])]
    public function getResultat(int $idEtudiant, int $idSemestre, ResultatRepository $resultatRepository): JsonResponse
    {
        $resultat = $resultatRepository->getResultatBilanGeneral($idEtudiant, $idSemestre);

        return $this->json($resultat);
    }
}
?>