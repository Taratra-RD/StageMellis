<?php

namespace App\Controller;

use App\Entity\Ecran;
use App\Entity\Etat;
use App\Entity\InterfacePort;
use App\Entity\Marque;
use App\Entity\Port;
use App\Entity\Souris;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class DataController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/data', name: 'app_data')]
    public function index(Request $request, SerializerInterface $serializer)
    {
        $filename = __DIR__."/INVENTAIRES.csv";
        $handle = fopen($filename, 'r');

        $test = [];

        if ($handle !== false) {
            // Read the CSV file line by line
            while (($data = fgetcsv($handle)) !== false) {

                $test[] = $data;
        
            }
            
            // Close the file handle
            fclose($handle);
        } else {
            echo 'Failed to open the CSV file.';
        }
        dd($test);
        $i = 1;
        while($i<27){
            $user = new User();
            $ecran = new Ecran();
            $marqueEcr = new Marque();
            $port = new Port();
            $souris = new Souris();
            $marqueSou = new Marque();
            $etat = new Etat();
            $interfacePort = new InterfacePort();

            $etat->setDesignationEtat($test[$i][15]);
            $etat->setDescription("Parfait");

            $user->setUsername($test[$i][5]);
            $user->setMatricule($test[$i][3]);
            $user->setNom($test[$i][4]);
            $user->setPrenom($test[$i][5]);
            $user->setIp("");
            $user->setContact($test[$i][7]);
            $user->setMail($test[$i][8]);

            $marqueEcr->setDesignation($test[$i][9]);
            $port->setDesignationPort($test[$i][12]);
            $ecran->setPort($port);
            $ecran->setMarque($marqueEcr);
            $ecran->setReference($test[$i][10]);
            $ecran->setDimension($test[$i][11]);
            $ecran->setSn($test[$i][13]);
            $user->addEcran($ecran);

            $marqueSou->setDesignation($test[$i][16]);
            $souris->setMarque($marqueSou);
            $souris->setEtat($etat);
            $interfacePort->setTypeInterface($test[$i][18]);
            $souris->setInterfacePort($interfacePort);
            $user->addSouri($souris);

            







            $i++;
        }
        

        //return $this->json();

    }
}
