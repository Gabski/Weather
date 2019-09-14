<?php

namespace App\Controller;

use App\Entity\Location;
use App\Form\LocationType;
use App\Service\OpenStreetMap;
use App\Service\OpenWeatherMap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(Request $request, OpenStreetMap $osm, OpenWeatherMap $owm)
    {
        $location = new Location();
        $form = $this->createForm(LocationType::class, $location);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $location = $form->getData();
            $location = $osm->find($location);
            $owm->weather($location);
        }

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
            'location' => $location,
        ]);
    }
}