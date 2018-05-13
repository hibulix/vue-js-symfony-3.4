<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Image;
use AppBundle\Service\Hydrator;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route("/admin/create", name="create_article")
     * @param Request $request
     * @param ObjectManager $manager
     * @return JsonResponse
     */
    public function createArticleAction(Request $request, Hydrator $hydrator)
    {
        if ($request->isXmlHttpRequest()) {

            if ($hydrator->isFormValid([Article::class, Image::class])) {
                return $hydrator->hydrateObject(Article::class);
            } else {
                return new JsonResponse('Formulaire invalide');
            }
        } else {
            return new JsonResponse('Requête non valide', Response::HTTP_BAD_REQUEST);
        }
    }
}