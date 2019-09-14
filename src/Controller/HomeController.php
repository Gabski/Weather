<?php

namespace App\Controller;

use App\Entity\Location;
use App\Form\LocationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $form = $this->createForm(LocationType::class, new Location());
        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}