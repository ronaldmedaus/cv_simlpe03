<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\LangueRepository;
use App\Repository\LoisirRepository;
use App\Repository\FormationRepository;
use App\Repository\CompetenceRepository;
use App\Repository\ExperienceRepository;
use App\Repository\TechnologieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CvController extends AbstractController
{
    #[Route('/cv', name: 'app_cv')]
    public function index(ExperienceRepository $experienceRepository, CompetenceRepository $competenceRepository, FormationRepository $formationRepository, LangueRepository $langueRepository, LoisirRepository $loisirRepository, TechnologieRepository $technologieRepository, UserRepository $userRepository): Response
    {
        $experiences = $experienceRepository->findAll();
        $competences = $competenceRepository->findAll(
            [],
            [
                'id' => 'DESC'
            ],
        );
        $formations = $formationRepository->findBy(
            [],
            [
                'id' => 'DESC'
            ],
        );
        $technologies = $technologieRepository->findAll();
        $langues = $langueRepository->findAll();
        $loisirs = $loisirRepository->findAll();
        $users = $userRepository->findAll();

        return $this->render('cv/cv.html.twig', [
            'experiences' => $experiences,
            'competences' => $competences,
            'formations' => $formations,
            'technologies' => $technologies,
            'langues' => $langues,
            'loisirs' => $loisirs,
            'users' => $users,
        ]);
    }
}
