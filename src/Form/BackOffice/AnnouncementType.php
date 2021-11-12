<?php

namespace App\Form\BackOffice;

use App\Entity\Member;
use App\Entity\Category;
use App\Entity\Announcement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnouncementType extends AbstractType
{
    private $security;

    public function __construct(Security $security)    
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /**
         * @var User
         */

        $enterprise = $this->security->getUser();
       
       // dd($enterprise);
      

        $builder
            ->add('title')
            ->add('description')                     
            ->add('category', EntityType::class,[
                'class' => Category::class])  
            ->add('members', EntityType::class,[
                'class' => Member::class,
                'choice_label' => 'firstname',
                'multiple' => true,
                'disabled' =>true]) 
            ;                             
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
