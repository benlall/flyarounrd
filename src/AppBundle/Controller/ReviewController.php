<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Review;

/**
 * Review controller
 *
 * @Route("review")
 */

class ReviewController extends Controller
{
    /**
     * List all reviews
     *
     * @Route("/", name="review_index")
     * @Method("GET")
     */

    public function indexAction()
    {
        return $this->render('review/index.html.twig');
    }

    /**
     * New review
     *
     * @Route("/new", name="review_new")
     * @Method({"GET","POST"})
     */

    public function newAction(Request $request)
    {
        return $this->render('review/new.html.twig');
    }

}
