<?php
/**
 * Created by PhpStorm.
 * User: hassine
 * Date: 10/19/2016
 * Time: 11:53 AM
 */

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Name ...')))
            ->add('surname', 'text', array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Surname ...')))
            ->add('username', null, array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Username ...'), 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'E-mail ...'), 'translation_domain' => 'FOSUserBundle'))
            ->add('address', 'text', array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Address ...')))
            ->add('phone', 'text', array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Phone number ...')))
            ->add('website', 'text', array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'website ...')))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Password ...')),
                'second_options' => array('label' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Repeat password ...')),
                'invalid_message' => 'fos_user.password.mismatch',

            ))
            ->add('parent_id', 'hidden', array('label' => false));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}