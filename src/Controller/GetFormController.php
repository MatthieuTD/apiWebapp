<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetFormController extends AbstractController
{
    /**
     * @Route("/getform", name="get_form")
     */
    /**
     * @param Request $request
     * @return Response
     */

    public function test(Request $request) : Response{
        dd($request);
        $reponse = new Response();
        return $this->json(['username' => 'jane.doe']);
    }
}
