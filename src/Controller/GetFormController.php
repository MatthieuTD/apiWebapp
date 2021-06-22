<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\AnswerOption;
use App\Entity\Question;
use App\Entity\QuestionOption;
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

    public function formAff(Request $request) : Response{

        $entityManager = $this->getDoctrine()->getManager();
        $testj = $request->getContent();
        $testj = json_decode($testj, true);
        $token = $testj["token"];

        $user = new Answer();
        $user->setToken($token);

        foreach ($testj["data"] as $key => $question){
            $quest = $this->getDoctrine()
                ->getRepository(Question::class)
                ->find($key);

            if ( is_array($question) ) {

                foreach ($question as  $option) {
                    foreach ($option as $key_op => $op){


                    $reponseOp = $this->getDoctrine()
                        ->getRepository(QuestionOption::class)
                        ->find($key_op);


                    $rep_user = new AnswerOption();

                    $rep_user->setQuestion($quest);
                    $rep_user->setQuestionOption($reponseOp);
                    $user->addAnswerOption($rep_user);

                    $entityManager->persist($rep_user);
                    $entityManager->persist($quest);

                    $entityManager->persist($reponseOp);

                }
            }}
                else{

                    $reponse = new QuestionOption();
                    $reponse->setName($question);

                    $quest->addQuestionOption($reponse);


                    $rep_user = new AnswerOption();

                    $rep_user->setQuestion($quest);
                    $rep_user->setQuestionOption($reponse);
                    $user->addAnswerOption($rep_user);

                    $entityManager->persist($rep_user);
                    $entityManager->persist($quest);

                    $entityManager->persist($reponse);


                }

                }
        $entityManager->persist($user);

        $entityManager->flush();

        return $this->json($question);
    }
}
