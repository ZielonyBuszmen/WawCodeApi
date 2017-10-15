<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\CommentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Comment
{
    use Timestampable;
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity="Chat")
     * @ORM\JoinColumn(name="chat_id", referencedColumnName="id")
     * @var Chat
     */
    private $chat;

    public function __construct(string $message, string $userName, Chat $chat)
    {
        $this->message = $message;
        $this->username = $userName;
        $this->chat = $chat;
        $chat->addComment($this);
    }

    public function getID()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

}