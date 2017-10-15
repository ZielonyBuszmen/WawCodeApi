<?php


namespace AppBundle\Entity\Repository;


use AppBundle\Form\HistoricalEventData;
use Doctrine\ORM\EntityRepository;

class HistoricalEventRepository extends EntityRepository
{
    public function findByDate($day, $month)
    {
        return $this->findBy([
            'day' => $day,
            'month' => $month,
        ]);
    }

    public function findByMonth($month)
    {
        return $this->findBy([
            'month' => $month,
        ]);
    }

    public function findByYear($year)
    {
        return $this->findBy([
            'month' => $year,
        ]);
    }

    public function findByDateTime(\DateTime $date)
    {
        return $this->findBy([
            'day' => $date->format('d'),
            'month' => $date->format('m'),
            'year' => $date->format('Y'),
        ]);
    }

    public function findByDateRandom($day, $month)
    {
        return $this->findOneBy([
            'day' => $day,
            'month' => $month,
        ]);
    }

    public function findSameAs(HistoricalEventData $data)
    {
        return $this->findOneBy([
            'day' => $data->day,
            'month' => $data->month,
            'year' => $data->year,
            'name' => $data->name,
        ]);
    }


}