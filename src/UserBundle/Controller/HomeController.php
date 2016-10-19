<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $userManager = $this->get('fos_user.user_manager');
            $users = $userManager->findUsers();

            foreach ($users as $key => $u) {
                if ($u->getParentID() !== $this->getUser()->getId()) {

                    unset($users[$key]);
                }
            }

            return $this->render('UserBundle:Home:index.html.twig', array(
                'users' => $users
            ));
        } else return $this->redirect('/');

    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        $em->remove($user);
        $em->flush();
        return $this->redirect('/home');
    }


}
