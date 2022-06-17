<?php

namespace App\Form;


use App\Entity\Employes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EmployesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //  Mise en forme avancée du formulaire
        $builder
            ->add('prenom', null, [
                "label" => "Prénom",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "attr" => ["placeholder" => "Saisir Prénom"]
            ])
            ->add('nom', null, [
                "label" => "Nom",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "attr" => ["placeholder" => "Saisir Nom"]
            ])
            ->add('telephone', null, [
                "label" => "Téléphone",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "attr" => ["placeholder" => "Saisir Numéro"]
            ])
            ->add('email', null, [
                "label" => "Email",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "attr" => ["placeholder" => "Saisir Email"]
            ])
            ->add('adresse', TextareaType::class, [
                "label" => "Adresse",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "attr" => ["placeholder" => "Saisir Adresse", "rows" => 2]
            ])
            ->add('poste', null, [
                "label" => "Poste",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "attr" => ["placeholder" => "Saisir Poste"]
            ])
            ->add('salaire', null, [
                "label" => "Salaire",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "attr" => ["placeholder" => "Saisir Salaire"]
            ])
            ->add('datedenaissance', DateType::class, [
                "label" => "Date de Naissance",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => ["class" => "input-group-text"],
                "widget" => "single_text"
            ])
            ->add("enregistrer", SubmitType::class, [
                "attr" => [
                    "class" => "w-100 btn btn-outline-success"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
