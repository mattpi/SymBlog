<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    /**
     * @Route("/{id}", name="BloggerBlogBundle_blog_show",requirements={"_method" = "GET","id" = "\d+"})
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }
}