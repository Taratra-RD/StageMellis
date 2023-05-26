<?php

namespace App\Controller;

use App\Entity\Ecran;
use App\Entity\Marque;
use App\Entity\Port;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/data', name: 'app_data')]
    public function index(): Response
    {
        $ecran = $this->entityManager->getRepository(Ecran::class)->findAll();
        return $this->json($ecran, 200, [], ['groups' => 'ecran:read']);

    }
}
