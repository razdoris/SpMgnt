<?php

namespace App\Controller\Api;

use App\Entity\ApplicationStandings;
use App\Repository\ApplicationStandingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StandingController extends AbstractController
{
    /**
     * @Route("/api/standing", name="api_standing")
     */
    public function index(): Response
    {
        return $this->render('api/standing/index.html.twig', [
            'controller_name' => 'StandingController',
        ]);
}


    /**
     * @Route("/api/majClub", name="api_majClub")
     */
    public function majClubInStanding(
        Request $request,
        EntityManagerInterface $entityManager,
        ApplicationStandingsRepository $standing
    ): response
    {

        $idApi=(int)$request->get('idApi');
        $clubInDatabase = $standing->findByIdApi($idApi);
        if(!$clubInDatabase){
            $club = new ApplicationStandings();
            $club->setClubName($request->get('equipe'));
            $club->setLogo($request->get('logo'));
            $club->setIdApi($idApi);
        }else{
            $club = $clubInDatabase[0];
        }

        $club->setClubPosition($request->get('position'));
        $club->setClubPoints((int)$request->get('points'));
        $club->setClubPlayedGames((int)$request->get('played'));
        $club->setClubWon((int)$request->get('won'));
        $club->setClubLost((int)$request->get('lost'));
        $club->setClubDraw((int)$request->get('draw'));
        $club->setClubgoalFor((int)$request->get('goalFor'));
        $club->setClubGoalAgainst((int)$request->get('goalAgainst'));
        $entityManager->persist($club);
        $entityManager->flush();


        return new JsonResponse(['data' => 'maj'],200);
    }


    /**
     * @Route("/api/delClub", name="api_delClub")
     */
    public function deleteClubInStanding(
        Request $request,
        EntityManagerInterface $entityManager,
        ApplicationStandingsRepository $standing
    ): response
    {
        $standing->deleteAll();
        $entityManager->flush();
        return new JsonResponse(['data' => 'maj'],200);
    }
}
