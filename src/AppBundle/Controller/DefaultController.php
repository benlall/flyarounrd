<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    //c'est ici que l'on cree les autres routes necessaires si besoin
    /**
     * @Route("/test", name="test", defaults={"name"="ben"})
     */
    public function testAction(Request $request, $name)
    {
        return $this->render('default/test.html.twig', [ 'name' => $name,
        ]);
    }

    /**
     * @Route("/form", name="form")
     */
    public function formAction(Request $request)
    {
        return $this->render('default/form.html.twig');
    }
}
