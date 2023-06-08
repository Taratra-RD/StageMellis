<?php

namespace App\Controller;

use App\Entity\Ecran;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EcranController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Ecran entity.
     */
    #[Route('/api/manage/ecran', name: 'app-manage_ecran_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Port object
            $ecran = $serializer->deserialize($jsonRecu, Ecran::class, 'json');

            // Persist the Port entity
            $this->entityManager->persist($ecran);
            $this->entityManager->flush();

            // Return a JSON response with the created Ecran entity
            return $this->json($ecran, 201, ['message' => 'Ecran entity created successfully'], ['groups' => 'ecran:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Port entities.
     */
    #[Route('/api/manage/ecran', name: 'app-manage_ecran', methods: ['GET'])]
    public function getEcran()
    {
        // Retrieve all Port entities from the database
        $ecran = $this->entityManager->getRepository(Ecran::class)->findAll();

        // Return a JSON response with the retrieved Ecran entities
        return $this->json($ecran, 200, [], ['groups' => 'ecran:read']);
    }
}
