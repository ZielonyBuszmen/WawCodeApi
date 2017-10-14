<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class ApiController extends BaseController
{

    public function testAction()
    {
        return new Response('adadasda');
    }
}