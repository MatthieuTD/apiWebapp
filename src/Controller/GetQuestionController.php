<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuestionOption;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetQuestionController extends AbstractController
{
    /**
     * @Route("/getQuest", name="get_question")
     */
   public function getData(){

       $questionsRep = $this->getDoctrine()
           ->getRepository(Question::class)
           ->findAll();

      // dd($questionsRep);
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
