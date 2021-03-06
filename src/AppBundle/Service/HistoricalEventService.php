<?php

namespace AppBundle\Service;

use AppBundle\Entity\Chat;
use AppBundle\Entity\HistoricalEvent;
use AppBundle\Entity\Repository\ChatRepository;
use AppBundle\Entity\Repository\HistoricalEventRepository;
use AppBundle\Form\HistoricalEventData;
use Doctrine\ORM\EntityManager;

class HistoricalEventService
{

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var HistoricalEventRepository
     */
    private $repository;
    /**
     * @var ChatRepository
     */
    private $chatRepository;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(HistoricalEvent::class);
        $this->chatRepository = $this->em->getRepository(Chat::class);

    }

    public function createHistoricalEvent(HistoricalEventData $data)
    {
        $is_duplicate = (bool)$this->repository->findSameAs($data);
        if($is_duplicate) {
            return false;
        }

        $historicalEvent = new HistoricalEvent();
        $historicalEvent->setDay($data->day);
        $historicalEvent->setMonth($data->month);
        $historicalEvent->setYear($data->year);
        $historicalEvent->setName($data->name);
        $historicalEvent->setContent($data->content);
        $historicalEvent->setImageUrl($data->imageUrl);

        $chat = $this->chatRepository->findOneBy([]);

        $historicalEvent->setChat($chat);

        $this->em->persist($historicalEvent);
        return true;
    }
}