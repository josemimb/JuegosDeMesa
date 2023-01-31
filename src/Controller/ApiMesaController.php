<?php

namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Mesa;
 
//Ruta de que es una api
#[Route('/api', name: 'api_')]
class ApiMesaController extends AbstractController
{
    //ruta mesa que nos devuelve todas las mesas con un get
    #[Route('/mesa', name: 'mesa_index', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    { 
        $mesas = $doctrine
            ->getRepository(Mesa::class)
            ->findAll();
 
        $data = [];
 
        foreach ($mesas as $mesa) {
           $data[] = [
               'id' => $mesa->getId(),
               'nombre' => $mesa->getNombre(),
               'ancho' => $mesa->getAncho(),
               'alto' => $mesa->getAlto(),
               'x' => $mesa->getX(),
               'y' => $mesa->getY(),
           ];
        }
        return $this->json($data);
    }
    
    //ruta que nos crea una mesa con el metodo post
    #[Route('/mesa', name: 'mesa_new', methods: ['POST'])]
    public function new(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
 
        $mesa = new Mesa();
        $mesa->setNombre($request->request->get('nombre'));
        $mesa->setAncho($request->request->get('ancho'));
        $mesa->setAlto($request->request->get('alto'));
        $mesa->setX($request->request->get('x'));
        $mesa->setY($request->request->get('y'));
 
        $entityManager->persist($mesa);
        $entityManager->flush();
 
        return $this->json('Created new mesa successfully with id ' . $mesa->getId());
    }
    
    //ruta mesa que nos devuelve una mesa por su id get
    #[Route('/mesa/{id}', name: 'mesa_show', methods: ['GET'])]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $mesa = $doctrine
            ->getRepository(Mesa::class)
            ->find($id);
 
        if (!$mesa) {
            return $this->json('Mesa no encontrada por la id ' . $id, 404);
        }
        $data =  [
            'id' => $mesa->getId(),
            'nombre' => $mesa->getNombre(),
            'ancho' => $mesa->getAncho(),
            'alto' => $mesa->getAlto(),
            'x' => $mesa->getX(),
            'y' => $mesa->getY(),
        ];
         
        return $this->json($data);
    }
 
    //ruta que nos actualiza una msea con put
    #[Route('/mesa/{id}', name: 'mesa_edit', methods: ['PUT'])]
    public function edit(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $mesa = $entityManager->getRepository(Mesa::class)->find($id);
 
        if (!$mesa) {
            return $this->json('No mesa found for id' . $id, 404);
        }
 
        $mesa->setNombre($request->request->get('nombre'));
        $mesa->setAncho($request->request->get('ancho'));
        $mesa->setAlto($request->request->get('alto'));
        $mesa->setX($request->request->get('x'));
        $mesa->setY($request->request->get('y'));
        $entityManager->flush();
 
        $data =  [
            'id' => $mesa->getId(),
            'nombre' => $mesa->getNombre(),
            'ancho' => $mesa->getAncho(),
            'alto' => $mesa->getAlto(),
            'x' => $mesa->getX(),
            'y' => $mesa->getY(),
        ];
         
        return $this->json($data);
    }
 
    //ruta que nos elimina una mesa con delete
    #[Route('/mesa/{id}', name: 'mesa_delete', methods: ['DELETE'])]
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $mesa = $entityManager->getRepository(mesa::class)->find($id);
 
        if (!$mesa) {
            return $this->json('No mesa found for id' . $id, 404);
        }
 
        $entityManager->remove($mesa);
        $entityManager->flush();
 
        return $this->json('Deleted a mesa successfully with id ' . $id);
    }
 
 
}