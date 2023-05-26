<?php

namespace App\Controller;

use App\Entity\Lecteur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class LecteurController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Lecteur entity.
     */
    #[Route('/api/manage/lecteur', name: 'app-manage_lecteur_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Lecteur object
            $lecteur = $serializer->deserialize($jsonRecu, Lecteur::class, 'json');

            // Persist the Lecteur entity
            $this->entityManager->persist($lecteur);
            $this->entityManager->flush();

            // Return a JSON response with the created Lecteur entity
            return $this->json($lecteur, 201, ['message' => 'Lecteur entity created successfully'], ['groups' => 'lecteur:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Lecteur entities.
     */
    #[Route('/api/manage/lecteur', name: 'app-manage_lecteur', methods: ['GET'])]
    public function getLecteur()
    {
        // Retrieve all Lecteur entities from the database
        $lecteur = $this->entityManager->getRepository(Lecteur::class)->findAll();

        // Return a JSON response with the retrieved Lecteur entities
        return $this->json($lecteur, 200, [], ['groups' => 'lecteur:read']);
    }
}
