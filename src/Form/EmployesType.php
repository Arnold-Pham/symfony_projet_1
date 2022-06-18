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
                //  Contenu de la balise label (ce sui est affiché sur la page)
                "label" => "Prénom",
                //  Propriétés de la balise div contenant le label et l'input
                "row_attr" => ["class" => "mb-3 input-group"],
                //  Propriétés de la balise label
                "label_attr" => [
                    "title" => "Ajouter un prénom",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                //  Propriétés de la balise input
                "attr" => ["placeholder" => "Saisir Prénom"]
            ])
            ->add('nom', null, [
                "label" => "Nom",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => [
                    "title" => "Ajouter un nom",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                "attr" => ["placeholder" => "Saisir Nom"]
            ])
            ->add('telephone', null, [
                "label" => "Téléphone",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => [
                    "title" => "Ajouter un numéro",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                "attr" => ["placeholder" => "Saisir Numéro"]
            ])
            ->add('email', null, [
                "label" => "Email",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => [
                    "title" => "Ajouter un email",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                "attr" => ["placeholder" => "Saisir Email"]
            ])
            ->add('adresse', TextareaType::class, [
                "label" => "Adresse",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => [
                    "title" => "Ajouter une adresse",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                "attr" => ["placeholder" => "Saisir Adresse", "rows" => 2]
            ])
            ->add('poste', null, [
                "label" => "Poste",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => [
                    "title" => "Ajouter un poste",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                "attr" => ["placeholder" => "Saisir Poste"]
            ])
            ->add('salaire', null, [
                "label" => "Salaire",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => [
                    "title" => "Ajouter un salaire",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                "attr" => ["placeholder" => "Saisir Salaire"]
            ])
            ->add('datedenaissance', DateType::class, [
                "label" => "Date de Naissance",
                "row_attr" => ["class" => "mb-3 input-group"],
                "label_attr" => [
                    "title" => "Ajouter une date de naissance",
                    "class" => "bg-primary bg-opacity-10 fw-semibold"
                ],
                "widget" => "single_text"
            ])
            ->add("enregistrer", SubmitType::class, [
                "attr" => [
                    "class" => "w-100 btn btn-outline-success",
                    "title" => "Envoyer"
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
