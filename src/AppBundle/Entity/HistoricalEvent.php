<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="historical_events")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\HistoricalEventRepository")
 */
class HistoricalEvent
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $day;

    /**
     * @ORM\Column(type="integer")
     */
    private $month;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $content;

    public function getId()
    {
        return $this->id;
    }

    public function getDateObject()
    {
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, $this->day);
        return $date;
    }

    public function setDateObject(\DateTime $date)
    {
        $this->day = $date->format('Y');
        $this->month = $date->format('m');
        $this->year = $date->format('d');
    }

    public function getDay()
    {
        return $this->day;
    }

    public function setDay($day)
    {
        $this->day = $day;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }


}