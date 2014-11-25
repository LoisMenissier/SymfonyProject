<?php

namespace Cergy\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Cergy\NewsBundle\Form\Type\NewsType;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()->getRepository('CergyNewsBundle:News')->findAll();

        return $this->render('CergyNewsBundle:News:list.html.twig', array('news' => $news));
    }

    /**
     * @Route("/create")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(new NewsType());
        if ($request->isMethod('POST')){
            $form->handleRequest($request);

        }

        return $this->render('CergyNewsBundle:News:create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
