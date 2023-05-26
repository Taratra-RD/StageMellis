<?php

namespace App\Controller;

use App\Entity\Reference;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ReferenceController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Reference entity.
     */
    #[Route('/api/manage/reference', name: 'app-manage_reference_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Reference object
            $reference = $serializer->deserialize($jsonRecu, Reference::class, 'json');

            // Persist the Reference entity
            $this->entityManager->persist($reference);
            $this->entityManager->flush();

            // Return a JSON response with the created Reference entity
            return $this->json($reference, 201, ['message' => 'Reference entity created successfully'], ['groups' => 'reference:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Reference entities.
     */
    #[Route('/api/manage/reference', name: 'app-manage_reference', methods: ['GET'])]
    public function getReference()
    {
        // Retrieve all Reference entities from the database
        $reference = $this->entityManager->getRepository(Reference::class)->findAll();

        // Return a JSON response with the retrieved Reference entities
        return $this->json($reference, 200, [], ['groups' => 'reference:read']);
    }
}
