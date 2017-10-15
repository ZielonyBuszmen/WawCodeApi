<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Chat;
use AppBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommentController extends BaseController
{
    public function createAction(int $chatId)
    {
        $em = $this->getEntityManager();
        $chatRepository = $em->getRepository(Chat::class);
        $chat = $chatRepository->find($chatId);
        $comment = new Comment('Test', 'Test', $chat);
        $em->persist($comment);
        $em->flush();
        return new JsonResponse('', 200);
    }
}