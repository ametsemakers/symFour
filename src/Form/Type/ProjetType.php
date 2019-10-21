<?php
namespace App\Form\Type;

use App\Entity\Projet;
use App\Entity\Utilisateur;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//use Symfony\Component\Form\DataMapperInterface;

class ProjetType extends AbstractType //implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('parent', EntityType::class, array(
            //     'class' => 'App:Projet',
            //     'choice_label' => 'parent',
                // 'choice_value' => function (Projet $projet = null) {
                //      return $projet ? $projet->getParent() : '';
                // },
                //'mapped' => false,
            // ))
            // ->add('idUtil', EntityType::class, array(
            //     'class' => 'App:Projet',
            //     'choice_label' => 'idUtil',
                // 'choice_value' => function (Projet $projet = null) {
                //     return $projet ? $projet->getIdUtil() : '';
                // },
                //'mapped' => false,
            //))
            ->add('parent', ChoiceType::class, [
                'choices' => $options['parents'],
                // 'choice_label' => function($options) {
                //     $choice = array_flip($options['categories']);
                //     echo $choice[0];
                // },
            ])
            // ->add('idUtil', ChoiceType::class, [
            //     'choices' => $options['idUtils'],
                // 'choice_label' => function($options) {
                //     $choice = array_flip($options['categories']);
                //     echo $choice[0];
                // },
            //])
            ->add('avancement', ChoiceType::class, [
                'choices' => $options['avancement'],
            ])
            ->add('chercher', SubmitType::class)
            //->setDataMapper($this)
        ;
    }

    // public function mapDataToForms($data, $forms)
    // {
    //     $forms = iterator_to_array($forms);
    //     $forms['parent']->setData($data ? $data->getParent() : '');
    //     $forms['idUtil']->setData($data ? $data->getIdUtil() : '');
    // }

    // public function mapFormsToData($forms, &$data)
    // {
    //     $forms = iterator_to_array($forms);
    //     $data = new Projet(
    //         $forms['parent']->getData(), 
    //         $forms['idUtil']->getData()
    //     );
    // }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // 'data_class' => Projet::class,
            // 'empty_data' => null,
            'parents' => array(),
            'avancement' => array(),      
        ]);
    }
}