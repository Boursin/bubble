<?php


namespace OC\UserBundle\Form;

use OC\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname', TextType::class, ['label' => "show.user.first_name" , 'required' => false])
            ->add('lastname', TextType::class, ['label' => "show.user.last_name" ,'required' => false ])
            ->add('postcode')
            ->add('gender', ChoiceType::class, [ 'choices' => [
                'show.user.male' => 'male',
                'show.user.female' => 'female',
                'show.user.other'   => 'other'
            ],
                'label' => "show.user.gender"
                ,])
            ->add('birthday', DateType::class, ['label' => "show.user.birthday" ,'years' => range(1900, date('Y')),'required' => false ]);

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}