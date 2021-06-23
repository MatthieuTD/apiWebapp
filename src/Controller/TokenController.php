<?php

namespace App\Controller;

use App\Entity\Answer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TokenController extends AbstractController
{
    /**
     * @Route("/token", name="token")
     *
     * Permet d'ajouter l'email si l'utilisateur ne l'a pas fait
     */
    public function token(Request $request){

        $entityManager = $this->getDoctrine()->getManager();
        $call = $this->getDoctrine();
        $content = $request->getContent();
        $content = json_decode($content,true);

        $answer = $call->getRepository(Answer::class)->findOneBy(["token" => $content["token"]]);

        $answer->setMail($content["mail"]);
        $entityManager->persist($answer);
        $entityManager->flush();
        return $this->json($content);
    }
}
