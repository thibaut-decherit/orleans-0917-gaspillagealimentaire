<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 20/11/17
 * Time: 17:41
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PresentationController extends Controller
{
    /**
     * @Route("/", name="presentation")
     */
    public function presentationAction()
    {
        // replace this example code with whatever you need
        return $this->render('presentation/presentation.html.twig');
    }
}