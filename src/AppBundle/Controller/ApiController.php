<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HistoricalEvent;
use AppBundle\Entity\Repository\HistoricalEventRepository;
use AppBundle\Form\HistoricalEventData;
use AppBundle\Form\HistoricalEventFormType;
use AppBundle\Service\HistoricalEventService;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends BaseController
{

    /**
     * @var HistoricalEventService
     */
    private $historical_event_svc;

    /**
     * @param HistoricalEventService $historical_event_svc
     */
    public function __construct(HistoricalEventService $historical_event_svc)
    {
        $this->historical_event_svc = $historical_event_svc;
    }

    public function getTodayAction()
    {
        $date = new \Datetime("now");
        $month = $date->format('m');
        $day = $date->format('d');
        $repo = $this->getDoctrine()->getRepository(HistoricalEvent::class);
        $result = $result = $repo->findByDate($day, $month);
        return $result;
    }

    public function getTodayRandomAction()
    {
        $date = new \Datetime("now");
        $month = $date->format('m');
        $day = $date->format('d');
        $repo = $this->getDoctrine()->getRepository(HistoricalEvent::class);
        $result = $result = $repo->findByDateRandom($day, $month);
        $view = $this->view($result, 200);
        return $this->handleView($view);
    }

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
        $successed = $this->historical_event_svc->createHistoricalEvent($data);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $view = $this->view($successed, 200);
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

}