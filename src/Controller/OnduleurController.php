<?php

namespace App\Controller;

use App\Entity\Onduleur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class OnduleurController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Onduleur entity.
     */
    #[Route('/api/manage/onduleur', name: 'app-manage_onduleur_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Onduleur object
            $onduleur = $serializer->deserialize($jsonRecu, Onduleur::class, 'json');

            // Persist the Onduleur entity
            $this->entityManager->persist($onduleur);
            $this->entityManager->flush();

            // Return a JSON response with the created Onduleur entity
            return $this->json($onduleur, 201, ['message' => 'Onduleur entity created successfully'], ['groups' => 'onduleur:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Onduleur entities.
     */
    #[Route('/api/manage/onduleur', name: 'app-manage_onduleur', methods: ['GET'])]
    public function getOnduleur()
    {
        // Retrieve all Onduleur entities from the database
        $onduleur = $this->entityManager->getRepository(Onduleur::class)->findAll();

        // Return a JSON response with the retrieved Onduleur entities
        return $this->json($onduleur, 200, [], ['groups' => 'onduleur:read']);
    }
}
