<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="chat")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\ChatRepository")
 */
class Chat
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * One Chat has Many Comments.
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="chat")
     * @var ArrayCollection $comments
     */
    private $comments;

    /**
     * One Event has One Chat.
     * @ORM\OneToMany(targetEntity="HistoricalEvent", mappedBy="chat")
     */
    private $event;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
    }

}