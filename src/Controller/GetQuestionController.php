<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetQuestionController extends AbstractController
{
    /**
     * @Route("/getQuest", name="get_question")
     *
     * Retourne sous le format Json les questions avec leurs réponses
     */
   public function getData(){
       $call = $this->getDoctrine();
       $questionsRep = $call->getRepository(Question::class)->findAll();


       $listQuestion = [];

       foreach ($questionsRep as $question){

           $nomQuestion = $question->getName();
           $idQuestion = $question->getId();


        foreach ($question->getQuestionOptions() as $option){
            $options[] = [
                "id_option" => $option->getId(),
                "name" => $option->getName(),
                "img" => $option->getImg()
            ];
        }

           $listQuestion[] = [
               "id_question" => $idQuestion,
               "name" => $nomQuestion,
               "type" => $question->getType()->getName(),
               "options" => $options
           ];

        $options = [];
       }


       return $this->json($listQuestion);

   }
}
