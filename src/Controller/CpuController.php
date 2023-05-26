<?php

namespace App\Controller;

use App\Entity\CPU;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CpuController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Cpu entity.
     */
    #[Route('/api/manage/cpu', name:'app-manage_cpu_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Cpu object
            $cpu = $serializer->deserialize($jsonRecu, CPU::class, 'json');

            // Persist the Cpu entity
            $this->entityManager->persist($cpu);
            $this->entityManager->flush();

            // Return a JSON response with the created Cpu entity
            return $this->json($cpu, 201, ['message' => 'Cpu entity created successfully'], ['groups' => 'cpu:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all Cpu entities.
     */
    #[Route('/api/manage/cpu', name:'app-manage_cpu', methods:['GET'])]
    public function getCpu()
    {
        // Retrieve all Cpu entities from the database
        $cpu = $this->entityManager->getRepository(CPU::class)->findAll();

        // Return a JSON response with the retrieved cpu entities
        return $this->json($cpu, 200, [], ['groups' => 'cpu:read']);
    }
}
