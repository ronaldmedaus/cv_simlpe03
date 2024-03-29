<?php

namespace App\Controller;

use App\Repository\PortfolioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'app_portfolio')]
    public function index(PortfolioRepository $portfolioRepository): Response
    {
        $portfolios = $portfolioRepository->findAll();

        return $this->render('portfolio/portfolio.html.twig', [
            'portfolios' => $portfolios,
        ]);
    }
}
