<?php

namespace App\Controller;

use App\Entity\Alimentation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AlimentationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Alimentation entity.
     */
    #[Route('/api/manage/alimentation', name:'app-manage_alim_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Alimentation object
            $alim = $serializer->deserialize($jsonRecu, Alimentation::class, 'json');

            // Persist the Alimentation entity
            $this->entityManager->persist($alim);
            $this->entityManager->flush();

            // Return a JSON response with the created Alimentation entity
            return $this->json($alim, 201, ['message' => 'Alimentation entity created successfully'], ['groups' => 'alim:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all Alimentation entities.
     */
    #[Route('/api/manage/alimentation', name:'app-manage_alimentation', methods:['GET'])]
    public function getRam()
    {
        // Retrieve all Alimentation entities from the database
        $alim = $this->entityManager->getRepository(Alimentation::class)->findAll();

        // Return a JSON response with the retrieved Alimentation entities
        return $this->json($alim, 200, [], ['groups' => 'alim:read']);
    }
}
