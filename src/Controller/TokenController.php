<?php

namespace App\Controller;

use App\Entity\Answer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TokenController extends AbstractController
{
    /**
     * @Route("/token", name="token")
     */
    public function token(Request $request){

        $entityManager = $this->getDoctrine()->getManager();
        $content = $request->getContent();
        $content = json_decode($content,true);

        $answer = $this->getDoctrine()
            ->getRepository(Answer::class)
            ->findOneBy(["token" => $content["token"]]);

        $answer->setMail($content["mail"]);
        $entityManager->persist($answer);
        $entityManager->flush();
        return $this->json($content);
    }
}
