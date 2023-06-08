<?php

namespace App\Controller;

use App\Entity\Alimentation;
use App\Entity\Boitier;
use App\Entity\CarteMere;
use App\Entity\Clavier;
use App\Entity\CPU;
use App\Entity\Ecran;
use App\Entity\Etat;
use App\Entity\Hdd;
use App\Entity\InterfacePort;
use App\Entity\Marque;
use App\Entity\Port;
use App\Entity\Ram;
use App\Entity\ReferenceMB;
use App\Entity\Souris;
use App\Entity\Taille;
use App\Entity\TypeClavier;
use App\Entity\TypeCPU;
use App\Entity\TypeHdd;
use App\Entity\TypeRam;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\Persistence\ObjectManager;

use function PHPUnit\Framework\isEmpty;

class DataController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/data', name:'app_data')]
    public function load()
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
        $i = 1;
        while($i<27){
            $user = new User();
            $ecran = new Ecran();

            $marqueEcrI = $this->entityManager->getRepository(Marque::class)->findAll();

            if(!isEmpty($marqueEcrI)){
                for($i=0; $i<=count($marqueEcrI); $i++){
                    if($marqueEcrI[$i]->designation == $test[$i][9]){
                        $marqueEcr = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][9]);
                      
                    }else{
                        $marqueEcr = new Marque();
                    }
                }
            }else{
                $marqueEcr = new Marque();
            }
            
            $port = new Port();
            $souris = new Souris();
            $marqueSouI = $this->entityManager->getRepository(Marque::class)->findAll();
            for($i=0; $i<=count($marqueSouI); $i++){
                if($marqueSouI[$i]->designation == $test[$i][16]){
                    $marqueEcr = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][16]);
                  
                }else{
                    $marqueEcr = new Marque();
                }
            }

            $etat = new Etat();
            $interfacePort = new InterfacePort();
            $clavier = new Clavier();
            $marqueClI = $this->entityManager->getRepository(Marque::class)->findAll();
            for($i=0; $i<=count($marqueClI); $i++){
                if($marqueClI[$i]->designation == $test[$i][21]){
                    $marqueEcr = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][21]);
                  
                }else{
                    $marqueEcr = new Marque();
                }
            }

            $typeClv = new TypeClavier();
            $boitier = new Boitier();
            $ram = new Ram();
            $hdd = new Hdd();
            $mb = new CarteMere();
            $cpu = new CPU();
            $marqueRamI = $this->entityManager->getRepository(Marque::class)->findAll();
            foreach($marqueRamI as $marque){
                if($marque->designation == $test[$i][33]){
                    $marqueRam = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][33]);
                    
                }else{
                    $marqueRam = new Marque();
                }
            }

            $typeRam = new TypeRam();
            $marqueHddI = $this->entityManager->getRepository(Marque::class)->findAll();
            foreach($marqueHddI as $marque){
                if($marque->designation == $test[$i][26]){
                    $marqueHdd = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][26]);
                }else{
                    $marqueHdd = new Marque();
                }
            }

            $typeHdd = new TypeHdd();
            $taille = new Taille();
            $marqueCpuI = $this->entityManager->getRepository(Marque::class)->findAll();
            foreach($marqueCpuI as $marque){
                if($marque->designation == $test[$i][42]){
                    $marqueCpu = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][42]);
                }else{
                    $marqueCpu = new Marque();
                }
            }

            $typeCpu = new TypeCPU();
            $marqueMBI = $this->entityManager->getRepository(Marque::class)->findAll();
            foreach($marqueMBI as $marque){
                if($marque->designation == $test[$i][45]){
                    $marqueMB = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][45]);
                }else{
                    $marqueMB = new Marque();
                }
            }

            $refMB = new ReferenceMB();
            $alim = new Alimentation();
            $marqueAl = new Marque();
            $marqueAlI = $this->entityManager->getRepository(Marque::class)->findAll();
            foreach($marqueAlI as $marque){
                if($marque->designation == $test[$i][50]){
                    $marqueAl = $this->entityManager->getRepository(Marque::class)->findOneByDesignation($test[$i][50]);
                }else{
                    $marqueAl = new Marque();
                }
            }
            
            $etat->setDesignationEtat($test[$i][15]);
            $etat->setDescription("Parfait");

            $user->setUsername($i);
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
            $souris->setSn(" ");
            $souris->setNbrBouton((int)$test[$i][17]);
            $interfacePort->setTypeInterface($test[$i][18]);
            $souris->setInterfacePort($interfacePort);
            $user->addSouri($souris);

            $marqueCl->setDesignation($test[$i][21]);
            $clavier->setMarque($marqueCl);
            $clavier->setInterface($interfacePort);
            $clavier->setEtat($etat);
            $clavier->setSn(" ");
            $typeClv->setDesignationTypeClavier($test[$i][22]);
            $clavier->setTypeClavier($typeClv);
            $user->addClavier($clavier);

            $boitier->setName($test[$i][2]);
            $ram->setFrequence($test[$i][28]);
            $ram->setCapacite($test[$i][29]);
            $ram->setSn($test[$i][30]);
            $marqueRam->setDesignation($test[$i][26]);
            $ram->setMarque($marqueRam);
            $ram->setEtat($etat);
            $typeRam->setDesignationTypeRam($test[$i][27]);
            $ram->setTypeRam($typeRam);
            $boitier->addRam($ram);

            $marqueHdd->setDesignation($test[$i][33]);
            $hdd->setMarque($marqueHdd);
            $hdd->setEtat($etat);
            $typeHdd->setDesignationTypeHdd($test[$i][34]);
            $hdd->setTypeHdd($typeHdd);
            $taille->setDesignationTailleHdd($test[$i][36]);
            $hdd->setTaille($taille);
            $hdd->setCapacite($test[$i][35]);
            $hdd->setSn($test[$i][37]);
            $boitier->addHdd($hdd);

            $typeCpu->setDesignationTypeCpu($test[$i][43]);
            $cpu->setTypeCPU($typeCpu);
            $cpu->setEtat($etat);
            $marqueCpu->setDesignation($test[$i][42]);
            $cpu->setMarque($marqueCpu);
            $boitier->addCPUs($cpu);

            $marqueMB->setDesignation($test[$i][45]);
            $mb->setMarque($marqueMB);
            $mb->setSn($test[$i][49]);
            $mb->setTypeMB($test[$i][47]);
            $mb->setEtat($etat);
            $refMB->setDesignation($test[$i][46]);
            $mb->setReferenceMB($refMB);
            $boitier->setCarteMere($mb);

            $marqueAl->setDesignation($test[$i][50]);
            $alim->setMarque($marqueAl);
            $alim->setSn($test[$i][52]);
            $alim->setEtat($etat);
            $alim->setPuissance($test[$i][51]);
            $boitier->setAlimentation($alim);

            $user->addBoitier($boitier);

            $i++;

            $this->entityManager->persist($user);
        }
        $this->entityManager->flush();

        return $this->json($user, 200, [], ['groups' => 'user:read']);

    }
}
