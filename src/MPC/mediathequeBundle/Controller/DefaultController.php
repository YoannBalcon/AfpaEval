<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MPCmediathequeBundle:Default:index.html.twig');
    }
}
