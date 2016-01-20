<?php

namespace Headoo\EmailVerificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Headoo\EmailVerificationBundle\Verification;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $res = $this->container->get('headoo_email_verification.verification')->verify('cyril.bras@supinfo.com');
        //echo $res->body['success'];
        dump($res);
        return $this->render('HeadooEmailVerificationBundle:Default:index.html.twig');
    }
}
