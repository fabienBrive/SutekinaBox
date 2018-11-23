<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class,[
                'label' => 'FirstName',
                'attr' => [
                    'placeholder' => 'Your first-name'
                ]
            ])
            ->add('name', TextType::class,[
                'label' => 'Name',
                'attr' => [
                    'placeholder' => 'Your name...'
                ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'email...'
                ]
            ])
            ->add('password', PasswordType::class,[
                'label' => 'Password',
                'attr' => [
                    'placeholder' => 'password...'
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Register'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
