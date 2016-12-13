<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class AdvertController{
    public function indexAction()
    {
        $content= $this->get('templating')->render('MPCmediathequeBundle:Advert:index.html.twig');
        
        return new Response("$content");
    }
}
