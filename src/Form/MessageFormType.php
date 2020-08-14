<?php

namespace App\Form;

use App\Entity\Master;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userinput')
            ->add('transform', ChoiceType::class, [
                'choices'  => [
                    'capitalize' => true,
                    'SpaceToDash' => false,
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Master::class,
        ]);
    }
}
