<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Entity\QuestionOption;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /**
         * Paramétrage des types de question
         */
         $type_text = new Type();
         $type_text->setName("text");
         $type_text->setDescription("Question demandant une réponse de l'utilisateur");

         $type_bool = new Type();
         $type_bool->setName("bool");
         $type_bool->setDescription("Question avec une seul réponse juste");

         $type_multi = new Type();
         $type_multi->setName("multi");
         $type_multi->setDescription("Question à reponse multiple");

         $manager->persist($type_text);
         $manager->persist($type_bool);
         $manager->persist($type_multi);

        /**
         * Paramétrage des questions
         */

        $question_multi = new Question();
        $question_multi->setName("Quelle est votre tranche horaire pour cuisiner ?");
        $question_multi->setType($type_multi);

        $reponse_option1 = new QuestionOption();
        $reponse_option1->setName("12-13h");
        $reponse_option1->addQuestion($question_multi);

        $reponse_option2 = new QuestionOption();
        $reponse_option2->setName("10-11H");
        $reponse_option2->addQuestion($question_multi);

        $reponse_option3 = new QuestionOption();
        $reponse_option3->setName("18-18H");
        $reponse_option3->addQuestion($question_multi);

        $manager->persist($question_multi);
        $manager->persist($reponse_option1);
        $manager->persist($reponse_option2);
        $manager->persist($reponse_option3);




        $manager->flush();
    }
}
