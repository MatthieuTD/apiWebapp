<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\AnswerOption;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(): Response
    {
        $data = $this->listForm();
        //dd($data);
        return $this->render('form/index.html.twig', [
            'response' => $data,
        ]);
    }

    public function listForm(){
        $reponse = $this->getDoctrine()
            ->getRepository(Answer::class)->findAll();


        return $reponse;

    }
}
