<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\AnswerOption;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Translation\Util\ArrayConverter;

class UserFormController extends AbstractController
{
    /**
     * @Route("/formUser", name="user_form")
     */
    public function index(Request $request): Response
    {


        $id = $request->query->get("id");

        $answer = $this->getDoctrine()
            ->getRepository(Answer::class)->find($id);

        $answerOp = $this->getDoctrine()->getRepository(AnswerOption::class)->findBy(['answer' => $id]);

        //dd($answerOp);
        return $this->render('user_form/index.html.twig', [
            'an' => $answer,
            "anOp" => $answerOp
        ]);
    }

}
