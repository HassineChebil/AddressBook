<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileType extends AbstractType
{




    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('address', null, array('label' => 'Address','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'Email','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
            ->add('phone', null, array('label' => 'Phone','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
            ->add('website', null, array('label' => 'Website','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
        ;


    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User',
            'intention'  => 'profile',
        ));
    }

    public function getName()
    {
        return 'fos_user_profile';
    }

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', null, array('label' => 'form.username','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
            ->add('phone', 'email', array('label' => 'form.email','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
            ->add('website', 'email', array('label' => 'form.email','attr' => array('class' => 'form-control'), 'translation_domain' => 'FOSUserBundle'))
        ;
    }
}
