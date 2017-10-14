<?php
declare(strict_types=1);

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class HistoricalEventFormType extends BaseFormType
{
    protected $formClass = HistoricalEventData::class;

    public function buildForm(FormBuilderInterface $builder, array $options) :void
    {
        $builder
            ->add('name', TextType::class, [
            ])
            ->add('content', TextType::class, [
            ])
            ->add('day', TextType::class, [
            ])
            ->add('month', TextType::class, [
            ])
            ->add('year', TextType::class, [
            ])
        ;


    }
}