<?php

namespace App\Controller;

use App\Entity\Port;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PortController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Port entity.
     */
    #[Route('/api/manage/port', name: 'app-manage_port_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Port object
            $port = $serializer->deserialize($jsonRecu, Port::class, 'json');

            // Persist the Port entity
            $this->entityManager->persist($port);
            $this->entityManager->flush();

            // Return a JSON response with the created Port entity
            return $this->json($port, 201, ['message' => 'Port entity created successfully'], ['groups' => 'port:write']);
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
    #[Route('/api/manage/port', name: 'app-manage_port', methods: ['GET'])]
    public function getPort()
    {
        // Retrieve all Port entities from the database
        $port = $this->entityManager->getRepository(Port::class)->findAll();

        // Return a JSON response with the retrieved Port entities
        return $this->json($port, 200, [], ['groups' => 'port:read']);
    }
}
