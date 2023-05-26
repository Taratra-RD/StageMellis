<?php

namespace App\Controller;

use App\Entity\Hdd;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class HddController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Hdd entity.
     */
    #[Route('/api/manage/hdd', name: 'app-manage_hdd_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Hdd object
            $hdd = $serializer->deserialize($jsonRecu, Hdd::class, 'json');

            // Persist the Port entity
            $this->entityManager->persist($hdd);
            $this->entityManager->flush();

            // Return a JSON response with the created Hdd entity
            return $this->json($hdd, 201, ['message' => 'Hdd entity created successfully'], ['groups' => 'hdd:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Hdd entities.
     */
    #[Route('/api/manage/hdd', name: 'app-manage_hdd', methods: ['GET'])]
    public function getHdd()
    {
        // Retrieve all Hdd entities from the database
        $hdd = $this->entityManager->getRepository(Hdd::class)->findAll();

        // Return a JSON response with the retrieved Hdd entities
        return $this->json($hdd, 200, [], ['groups' => 'hdd:read']);
    }
}
