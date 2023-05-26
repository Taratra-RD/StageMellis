<?php

namespace App\Controller;

use App\Entity\ReferenceMB;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ReferenceMBController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a ReferenceMB entity.
     */
    #[Route('/api/manage/referenceMB', name:'app-manage_referenceMB_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a ReferenceMB object
            $referenceMB = $serializer->deserialize($jsonRecu, ReferenceMB::class, 'json');

            // Persist the ReferenceMB entity
            $this->entityManager->persist($referenceMB);
            $this->entityManager->flush();

            // Return a JSON response with the created ReferenceMB entity
            return $this->json($referenceMB, 201, ['message' => 'ReferenceMB entity created successfully'], ['groups' => 'referenceMB:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all ReferenceMB entities.
     */
    #[Route('/api/manage/referenceMB', name:'app-manage_referenceMB', methods:['GET'])]
    public function getReferenceMB()
    {
        // Retrieve all ReferenceMB entities from the database
        $referenceMB = $this->entityManager->getRepository(ReferenceMB::class)->findAll();

        // Return a JSON response with the retrieved ReferenceMB entities
        return $this->json($referenceMB, 200, [], ['groups' => 'referenceMB:read']);
    }
}
