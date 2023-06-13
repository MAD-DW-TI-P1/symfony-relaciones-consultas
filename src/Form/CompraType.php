<?php

namespace App\Form;

use App\Entity\Compra;
use App\Entity\Usuario;
use App\Entity\Producto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CompraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        //$usuarios = $this->em->getRepository('AppBundle:Usuario')->findAll();
        //dump();die;

        $builder
            ->add('usuario', EntityType::class, [
                'class' => Usuario::class,
                'attr' => [
                    'class' => 'form-select js-example'
                ],
                'required' => true,
                'placeholder' => '-choose_option-'
            ])
            ->add('producto', EntityType::class, [
                'class' => Producto::class,
                'attr' => [
                    'class' => 'form-select js-example'
                ],
                'required' => true,
                'placeholder' => '-choose_option-',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compra::class,
        ]);
    }
}
