<?php

namespace App\Controller;

use App\Entity\InterfacePort;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class InterfacePortController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a InterfacePort entity.
     */
    #[Route('/api/manage/interfacePort', name: 'app-manage_interfacePort_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a InterfacePort object
            $interfacePort = $serializer->deserialize($jsonRecu, InterfacePort::class, 'json');

            // Persist the InterfacePort entity
            $this->entityManager->persist($interfacePort);
            $this->entityManager->flush();

            // Return a JSON response with the created InterfacePort entity
            return $this->json($interfacePort, 201, ['message' => 'InterfacePort entity created successfully'], ['groups' => 'interfacePort:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all InterfacePort entities.
     */
    #[Route('/api/manage/interfacePort', name: 'app-manage_interfacePort', methods: ['GET'])]
    public function getInterfacePort()
    {
        // Retrieve all InterfacePort entities from the database
        $interfacePort = $this->entityManager->getRepository(InterfacePort::class)->findAll();

        // Return a JSON response with the retrieved InterfacePort entities
        return $this->json($interfacePort, 200, [], ['groups' => 'interfacePort:read']);
    }
}
