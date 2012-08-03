<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;


class PageController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('BloggerBlogBundle:Page:index.html.twig');
    }
    
    /**
     * @Route("/about")
     * @Template()
     */
    public function aboutAction()
    {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }
    
    /**
     * @Route("/contact", name="BloggerBlogBundle_contact",requirements={"_method" = "GET|POST"})
     * @Template()
     */
    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                ->setSubject('Contact enquiry from symblog')
                ->setFrom('matt@pureinnovation.com')
                ->setTo($this->container->getParameter('blogger_blog.emails.contact_email'))
                ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);

                $this->get('session')->setFlash('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');
                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }
        }

        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
}