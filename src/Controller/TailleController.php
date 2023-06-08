<?php

namespace App\Controller;

use App\Entity\Taille;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TailleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a TailleHdd entity.
     */
    #[Route('/api/manage/tailleHdd', name:'app-manage_tailleHdd_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a TailleHdd object
            $tailleHdd = $serializer->deserialize($jsonRecu, Taille::class, 'json');

            // Persist the TailleHdd entity
            $this->entityManager->persist($tailleHdd);
            $this->entityManager->flush();

            // Return a JSON response with the created TailleHdd entity
            return $this->json($tailleHdd, 201, ['message' => 'TailleHdd entity created successfully'], ['groups' => 'tailleHdd:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all TailleHdd entities.
     */
    #[Route('/api/manage/tailleHdd', name:'app-manage_tailleHdd', methods:['GET'])]
    public function getTailleHdd()
    {
        // Retrieve all TailleHdd entities from the database
        $tailleHdd = $this->entityManager->getRepository(Taille::class)->findAll();

        // Return a JSON response with the retrieved TailleHdd entities
        return $this->json($tailleHdd, 200, [], ['groups' => 'tailleHdd:read']);
    }
}
