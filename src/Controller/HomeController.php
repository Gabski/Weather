<?php

namespace App\Controller;

use App\Entity\Location;
use App\Entity\OpenWeatherMap;
use App\Form\LocationType;
use App\Service\OpenStreetMap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(Request $request, OpenStreetMap $osm)
    {
        $location = new Location();
        $form = $this->createForm(LocationType::class, $location);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $location = $form->getData();
            $location = $osm->find($location);

            $location->addForecast("Open Weather Map", OpenWeatherMap::class);

        }

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
            'location' => $location,
        ]);
    }
}