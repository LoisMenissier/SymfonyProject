<?php

namespace Cergy\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Cergy\NewsBundle\Form\Type\NewsType;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @Route("/", name="news_list")
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

            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                /*Flag de l'entité à sauvegarder*/
                $em->persist($form->getData());
                /*Toutes les classes mises dans l'entityManager vont être sauvegardées*/
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'La news a été ajoutée avec succès !');

                return $this->redirect($this->generateUrl('news_list'));
            }
        }

        return $this->render('CergyNewsBundle:News:create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}", name="news_update")
     */
    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('CergyNewsBundle:News')->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'Aucune news trouvée pour cet id : '.$id
            );
        }

        $form = $this->createForm(new NewsType(), $news);
        if ($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                /*Flag de l'entité à sauvegarder*/
                $em->persist($form->getData());
                /*Toutes les classes mises dans l'entityManager vont être sauvegardées*/
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'La news a été modifiée avec succès !');

                return $this->redirect($this->generateUrl('news_list'));
            }
        }

        return $this->render('CergyNewsBundle:News:update.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="news_delete")
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('CergyNewsBundle:News')->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'Vous ne pouvez pas supprimer la news pour cet id : '.$id
            );
        }

        $em->remove($news);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'La news a été détruite avec succès !');

        return $this->redirect($this->generateUrl('news_list'));
    }
}
