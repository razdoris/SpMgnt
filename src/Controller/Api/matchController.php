<?php

namespace App\Controller\Api;

use App\Entity\ApplicationMatch;
use App\Repository\ApplicationMatchRepository;
use App\Repository\ApplicationStandingsRepository;
use DateTimeInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class matchController extends AbstractController
{
    /**
     * @Route("/api/match", name="api_match")
     */
    public function index(): Response
    {
        return $this->render('api/match/index.html.twig', [
            'controller_name' => 'matchController',
        ]);
    }

    /**
     * @Route("/api/lastMatchDay", name="api_lastMatchDay")
     */
    public function lastMatchDay(
        ApplicationMatchRepository $match
    ): Response
    {
        $lastDate = ($match->lastDay());

        return new JsonResponse(['lastDay' => $lastDate],200);
    }

    /**
     * @Route("/api/addMatch", name="api_addMatch")
     */
    public function addMatch(
        ApplicationMatchRepository $match,
        ApplicationStandingsRepository $standing,
        EntityManagerInterface $entityManager,
        Request $request
    ): Response
    {
        $teamAway = $standing->findByIdApi((int)$request->get('awayTeam'));
        $teamHome = $standing->findByIdApi((int)$request->get('homeTeam'));
        $dateFormat = date_create($request->get('dateDay'));

        $match = new ApplicationMatch();
        $match->setAwayTeam($teamAway[0]);
        $match->setAwayTeamGoal((int)$request->get('awayTeamGoal'));
        $match->setHomeTeam($teamHome[0]);
        $match->setHomeTeamGoal((int)$request->get('homeTeamGoal'));
        $match->setIdApi((int)$request->get('idApi'));
        $match->setMatchDay((int)$request->get('matchDay'));
        $match->setDate($dateFormat);

        $entityManager->persist($match);
        $entityManager->flush();

        return new JsonResponse(['response' => 'ok'],200);
    }
}
