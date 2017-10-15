<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Chat;
use AppBundle\Entity\Comment;
use AppBundle\Form\CommentFormType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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

    public function createWithoutChatAction(Request $request)
    {
        $data = $this->handleRequest($request, CommentFormType::class);
        $em = $this->getEntityManager();
        $chatRepository = $em->getRepository(Chat::class);
        $chat = $chatRepository->findOneBy([]);
        $comment = new Comment($data->message, $data->name, $chat);
        $em->persist($comment);
        $em->flush();
        return new JsonResponse('', 200);
    }
}