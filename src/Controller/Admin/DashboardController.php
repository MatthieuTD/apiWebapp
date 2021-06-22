<?php

namespace App\Controller\Admin;

use App\Entity\Answer;
use App\Entity\AnswerOption;
use App\Entity\Question;
use App\Entity\QuestionOption;
use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(QuestionCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ApiWebApp');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Add Question', 'fas fa-list', Question::class)->setAction("new");
        yield MenuItem::linkToCrud('Add Reponse', 'fas fa-list', QuestionOption::class)->setAction("new");
        yield MenuItem::linkToCrud('Add Type', 'fas fa-list', Type::class)->setAction("new");
        yield MenuItem::linkToCrud(' Listes des reponses', 'fas fa-list', QuestionOption::class);
        yield MenuItem::linkToCrud('Formulaire reponse', 'fas fa-list', Answer::class);






    }
}
