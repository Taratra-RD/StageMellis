<?php

namespace App\Controller;

use App\Entity\TypeCPU;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TypeCpuController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a TypeCpu entity.
     */
    #[Route('/api/manage/typeCpu', name:'app-manage_typeCpu_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a TypeCpu object
            $typeCpu = $serializer->deserialize($jsonRecu, TypeCPU::class, 'json');

            // Persist the TypeCpu entity
            $this->entityManager->persist($typeCpu);
            $this->entityManager->flush();

            // Return a JSON response with the created TypeCpu entity
            return $this->json($typeCpu, 201, ['message' => 'TypeCpu entity created successfully'], ['groups' => 'typeCpu:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all TypeCpu entities.
     */
    #[Route('/api/manage/typeCpu', name:'app-manage_typeCpu', methods:['GET'])]
    public function getRam()
    {
        // Retrieve all TypeCpu entities from the database
        $typeCpu = $this->entityManager->getRepository(TypeCpu::class)->findAll();

        // Return a JSON response with the retrieved TypeCpu entities
        return $this->json($typeCpu, 200, [], ['groups' => 'typeCpu:read']);
    }
}
