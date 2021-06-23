<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\AnswerOption;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserFormController extends AbstractController
{
    /**
     * @Route("/formUser", name="user_form")
     *
     * Permet d'afficher les réponses par utilisateur
     */
    public function index(Request $request): Response
    {
        $call = $this->getDoctrine();

        $id = $request->query->get("id");

        $answer = $call->getRepository(Answer::class)->find($id);

        $answerOp = $call->getRepository(AnswerOption::class)->findBy(['answer' => $id]);

        //dd($answerOp);
        return $this->render('user_form/index.html.twig', [
            'an' => $answer,
            "anOp" => $answerOp
        ]);
    }

}
