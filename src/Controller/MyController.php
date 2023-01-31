<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MyController extends AbstractController
{
    #[Route('/socios', name:'socios')]
    public function socios()
    {
        $html = $this->render('admin/socios.html.twig');
        return $html;
    }
    #[Route('/calendario', name:'calendario')]
    public function calendario()
    {
        $html = $this->render('admin/calendario.html.twig');
        return $html;
    }
    #[Route('/gestionMesas', name:'gestionMesas')]
    public function gestionMesas()
    {
        $html = $this->render('admin/gestionMesas.html.twig');
        return $html;
    }
    #[Route('/mantenimientoJuegos', name:'mantenimientoJuegos')]
    public function mantenimientoJuegos()
    {
        $html = $this->render('mantenimiento/juegos.html.twig');
        return $html;
    }
    #[Route('/mantenimientoMesas', name:'mantenimientoMesas')]
    public function mantenimientoMesas()
    {
        $html = $this->render('mantenimiento/mesas.html.twig');
        return $html;
    }
    #[Route('/mantenimientoReservas', name:'mantenimientoReservas')]
    public function mantenimientoReservas()
    {
        $html = $this->render('mantenimiento/reservas.html.twig');
        return $html;
    }
    #[Route('/mantenimientoEventos', name:'mantenimientoEventos')]
    public function mantenimientoEventos()
    {
        $html = $this->render('mantenimiento/eventos.html.twig');
        return $html;
    }

    #[Route('/perfil', name:'perfil')]
    public function perfil()
    {
        $html = $this->render('user/perfil.html.twig');
        return $html;
    }

    #[Route('/reservas', name:'reservas')]
    public function reservas()
    {
        $html = $this->render('user/reservas.html.twig');
        return $html;
    }
    #[Route('/eventos', name:'eventos')]
    public function eventos()
    {
        $html = $this->render('user/eventos.html.twig');
        return $html;
    }
    #[Route('/login', name:'login')]
    public function login()
    {
        $html = $this->render('login.html.twig');
        return $html;
    }
    #[Route('/registro', name:'registro')]
    public function resgistro()
    {
        $html = $this->render('registro.html.twig');
        return $html;
    }
    #[Route('/landingPage', name:'landingPage')]
    public function landingPage()
    {
        $html = $this->render('landingPage.html.twig');
        return $html;
    }

    #[Route('/segundaPagina', name:'new')]
        public function nuevaRuta(){
            $users = [
                ['nombre'=>'josemi', 'id' => '1'],
                ['nombre'=>'josepa', 'id' => '2'],
                ['nombre'=>'martin', 'id' => '3'],
                ['nombre'=>'berlango', 'id' => '4'],
            ];
            $html = $this->render('nueva.html.twig', [
                'titulo'=>'usuarios',
                'users'=> $users,
                
                
            ]);

            return $html;
            // return new response ('josemi');
            // $suma=$n1+$n2;
            //  die("La suma es: ".$suma);
        }
}