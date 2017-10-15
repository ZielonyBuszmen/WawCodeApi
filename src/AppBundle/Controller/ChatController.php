<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Chat;
use AppBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\JsonResponse;

class ChatController extends BaseController
{
    public function listAction()
    {
        return $this->getEntityManager()->getRepository(Chat::class)->findAll();
    }
}