<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 23/11/2018
 * Time: 13:17
 */

namespace App\Form\BoxType;

use App\Entity\Box;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InitializationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', ChoiceType::class, [
                'label' => 'MonthBox',
                'choices'  => [
                    'Janvier' => 'janvier',
                    'Fevrier' => 'fevrier',
                    'Mars' => 'mars',
                    'avril' => 'avril',
                    'Mai' => 'mai',
                    'Juin' => 'juin',
                    'juillet' => 'juillet',
                    'Aout' => 'aout',
                    'Septembre' => 'septembre',
                    'Octobre' => 'octobre',
                    'Novembre' => 'novembre',
                    'Decembre' => 'decembre'
                ]
            ])
            ->add('budget', MoneyType::class,[
                'label' => 'Box Budget',
                'attr' => [
                    'placeholder' => '0'
                ]
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Box::class,
        ]);
    }
}