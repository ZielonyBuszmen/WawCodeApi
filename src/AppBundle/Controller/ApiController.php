<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HistoricalEvent;
use AppBundle\Entity\Repository\HistoricalEventRepository;
use AppBundle\Form\HistoricalEventData;
use AppBundle\Form\HistoricalEventFormType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends BaseController
{

    public function getByMonthAction($month)
    {
        $repo = $this->getDoctrine()->getRepository(HistoricalEvent::class);
        $result = $repo->findByMonth($month);
        $view = $this->view($result, 200);
        return $this->handleView($view);
    }

    public function getByMonthDayAction($month, $day)
    {
        $repo = $this->getDoctrine()->getRepository(HistoricalEvent::class);
        $result = $repo->findByDate($day, $month);
        $view = $this->view($result);
        return $this->handleView($view);
    }

    public function createAction(Request $request)
    {
        /** @var HistoricalEventData $data */
        $data = $this->handleRequest($request, HistoricalEventFormType::class);
        $event = new HistoricalEvent();

        $event->setName($data->name);
        $event->setContent($data->content);
        $event->setDay($data->day);
        $event->setMonth($data->month);
        $event->setYear($data->year);
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        $view = $this->view($event, 200);
        return $this->handleView($view);
    }


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
            ->findByDate(1, 8);
        $view = $this->view($result, 200);

        return $this->handleView($view);

    }
}