<?php

namespace App\Controller;

use App\Entity\CarteMere;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CarteMereController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a CarteMere entity.
     */
    #[Route('/api/manage/carteMere', name:'app-manage_carteMere_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a CarteMere object
            $carteMere = $serializer->deserialize($jsonRecu, CarteMere::class, 'json');

            // Persist the CarteMere entity
            $this->entityManager->persist($carteMere);
            $this->entityManager->flush();

            // Return a JSON response with the created CarteMere entity
            return $this->json($carteMere, 201, ['message' => 'Carte Mere entity created successfully'], ['groups' => 'carteMere:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all CarteMere entities.
     */
    #[Route('/api/manage/carteMere', name:'app-manage_carteMere', methods:['GET'])]
    public function getRam()
    {
        // Retrieve all CarteMere entities from the database
        $carteMere = $this->entityManager->getRepository(CarteMere::class)->findAll();

        // Return a JSON response with the retrieved CarteMere entities
        return $this->json($carteMere, 200, [], ['groups' => 'carteMere:read']);
    }
}
