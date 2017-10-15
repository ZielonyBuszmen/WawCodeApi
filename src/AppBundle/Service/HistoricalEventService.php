<?php

namespace AppBundle\Service;

use AppBundle\Entity\HistoricalEvent;
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
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(HistoricalEvent::class);

    }

    public function createHistoricalEvent(HistoricalEventData $data)
    {
        $is_duplicate = (bool)$this->repository->findSameAs($data);
        if($is_duplicate) {
            return false;
        }

        $entity = new HistoricalEvent();
        $entity->setDay($data->day);
        $entity->setMonth($data->month);
        $entity->setYear($data->year);
        $entity->setName($data->name);
        $entity->setContent($data->content);
        $entity->setImageUrl($data->imageUrl);

        $this->em->persist($entity);
        return true;
    }
}