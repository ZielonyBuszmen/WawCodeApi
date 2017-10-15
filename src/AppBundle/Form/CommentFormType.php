<?php
declare(strict_types=1);

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CommentFormType extends BaseFormType
{
    protected $formClass = CommentData::class;

    public function buildForm(FormBuilderInterface $builder, array $options) :void
    {
        $builder
            ->add('name', TextType::class)
            ->add('message', TextType::class)
        ;


    }
}