<?php

namespace App\Controller;

use App\Entity\Etat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EtatController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Etat entity.
     */
    #[Route('/api/manage/etat', name:'app-manage_etat_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Etat object
            $etat = $serializer->deserialize($jsonRecu, Etat::class, 'json');

            // Persist the Etat entity
            $this->entityManager->persist($etat);
            $this->entityManager->flush();

            // Return a JSON response with the created Etat entity
            return $this->json($etat, 201, ['message' => 'Etat entity created successfully'], ['groups' => 'etat:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all Etat entities.
     */
    #[Route('/api/manage/etat', name:'app-manage_etat', methods:['GET'])]
    public function getEtat()
    {
        // Retrieve all Etat entities from the database
        $alim = $this->entityManager->getRepository(Etat::class)->findAll();

        // Return a JSON response with the retrieved Etat entities
        return $this->json($alim, 200, [], ['groups' => 'etat:read']);
    }
}
