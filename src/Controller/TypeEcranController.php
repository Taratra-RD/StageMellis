<?php

namespace App\Controller;

use App\Entity\TypeEcran;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TypeEcranController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a TypeEcran entity.
     */
    #[Route('/api/manage/typeEcran', name:'app-manage_typeEcran_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a TypeEcran object
            $typeEcran = $serializer->deserialize($jsonRecu, TypeEcran::class, 'json');

            // Persist the TypeEcran entity
            $this->entityManager->persist($typeEcran);
            $this->entityManager->flush();

            // Return a JSON response with the created TypeEcran entity
            return $this->json($typeEcran, 201, ['message' => 'TypeEcran entity created successfully'], ['groups' => 'typeEcran:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all TypeEcran entities.
     */
    #[Route('/api/manage/typeEcran', name:'app-manage_typeEcran', methods:['GET'])]
    public function getRam()
    {
        // Retrieve all TypeEcran entities from the database
        $alim = $this->entityManager->getRepository(TypeEcran::class)->findAll();

        // Return a JSON response with the retrieved TypeEcran entities
        return $this->json($alim, 200, [], ['groups' => 'typeEcran:read']);
    }
}
