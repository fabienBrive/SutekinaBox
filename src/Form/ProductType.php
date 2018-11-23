<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Supplier;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('supplier', EntityType::class, [
                'class' => Supplier::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
                'label' => 'Supplier'
            ])
            ->add('name', TextType::class,[
                'label' => 'Name',
                'attr' => [
                    'placeholder' => 'the name product...'
                ]
            ])
            ->add('description', CKEditorType::class, [
                'required' => true,
                'label' => 'Description',
                'config' => [
                    'toolbar' => 'standard'
                ]
            ])
            ->add('Price', MoneyType::class,[
                'label' => 'Price in euros',
                'attr' => [
                    'placeholder' => '0'
                ]
            ])
            ->add('image', FileType::class, [
                'required' => false,
                'label' => 'image',
                'attr' => [
                    'class' => 'dropify'
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
            'data_class' => Product::class,
        ]);
    }
}
