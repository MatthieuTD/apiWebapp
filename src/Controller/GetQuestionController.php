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
           ->getRepository(QuestionOption::class)
           ->findAll();

       //dd($questionsRep);
       $listQuestion = [];

       foreach ($questionsRep as $question){

           $nomQuestion = $question->getQuestion()->getName();

           $listQuestion[$nomQuestion]["options"][] = $question->getName();


       }


       return $this->json($listQuestion);

   }
}
