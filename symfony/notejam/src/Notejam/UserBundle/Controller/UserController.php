<?php

namespace Notejam\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Notejam\UserBundle\Entity\User;
use Notejam\UserBundle\Form\Type\UserType;


class UserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NotejamUserBundle:User:index.html.twig', array('name' => $name));
    }

    public function signupAction(Request $request)
    {
        $user = new User();
        $userType = new UserType();
        $form = $this->createForm(new UserType(), $user);

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $form->handleRequest($request);
            if ($form->isValid()) {
                $user = $form->getData();
                $em->persist($user);
                $em->flush();

                // flash message
            }
        }
        return $this->render(
            'NotejamUserBundle:User:signup.html.twig',
            array('form' => $form->createView())
        );
    }

    public function signinAction()
    {
        // code...
    }

    public function forgotPasswordAction()
    {
        // code...
    }

    public function settingsAction()
    {
        // code...
    }
}
