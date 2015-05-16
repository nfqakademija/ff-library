<?php

namespace F4\LibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ReviewType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('review', 'textarea', array(
                    'label' => false,
                    'attr'  =>  array(
                        'class' => 'form-control')
                )
            );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'f4_librarybundle_review';
    }
}
