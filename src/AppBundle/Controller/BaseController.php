<?php

namespace AppBundle\Controller;


use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends FOSRestController
{

    protected function handleRequest(Request $request, string $form, array $options = [])
    {
        $form = $this->createForm($form, null, $options);
        $form->submit($request->request->all());

        if (!$form->isValid()) {
            throw new \Exception('Invalid form');
        }

        return $data = $form->getData();
    }

    protected function getEntityManager(): EntityManagerInterface
    {
        return $this->getDoctrine()->getManager();
    }
}