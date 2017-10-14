<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HistoricalEvent;
use AppBundle\Entity\Repository\HistoricalEventRepository;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends BaseController
{

    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historical_event = new HistoricalEvent();
        $historical_event->setName("Testowa nazwa");
        $historical_event->setDay(1);
        $historical_event->setMonth(2);
        $historical_event->setYear(1850);
        $historical_event->setContent("Miau");

        $em->persist($historical_event);
        $em->flush();

        return new Response('adadasda');
    }

    public function repositoryAction()
    {
        $result = $this->getDoctrine()->getRepository(HistoricalEvent::class)
            ->findByDate(1,8);


        return new Response('wyciaganie danych');

    }
}