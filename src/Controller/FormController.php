<?php

namespace App\Controller;

use App\Entity\Answer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     * Retourne une liste des personnes ayant répondues
     */
    public function index(): Response
    {
        $data = $this->listForm();

        return $this->render('form/index.html.twig', [
            'response' => $data,
        ]);

    }

    /**
     * @return object[]
     */
    public function listForm(){
        $call = $this->getDoctrine();
        $reponse = $call->getRepository(Answer::class)->findAll();
        return $reponse;

    }
}
