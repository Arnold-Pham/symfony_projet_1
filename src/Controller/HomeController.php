<?php

namespace App\Controller;


use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    //§ ================================  LISTE + AJOUT EMPLOYES  =================================

    #[Route("/", name: "home")]
    public function index(Request $request, ManagerRegistry $doctrine, EmployesRepository $employes): Response
    {
        //  Création d'un nouvel employé
        $employe = new Employes();
        //  Liste de tous les employés
        $employes = $employes->findAll();

        //  Mise en place du formulaire vide
        $form = $this->createForm(EmployesType::class, $employe);
        $form->handleRequest($request);
        
        //  Si formulaire bien rempli et entré, enregistrement, et redirection vers l'accueil
        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash("message_ajout", "Employé enregistré.");
            $em = $doctrine->getManager();
            $em->persist($employe);
            $em->flush();
            
            return $this->redirectToRoute("home");
        }
        
        //  Affichage de la page, avec deux éléments, la liste des employés et le formulaire d'ajout d'un employé
        return $this->render("home/index.html.twig", ["employes" => $employes, "form" => $form->createView()]);
    }



    //§ =================================  SUPPRESSION EMPLOYES  ==================================

    #[Route("/delete/{id}", name: "delete")]
    public function delete($id, ManagerRegistry $doctrine): Response
    {
        //  Recherche dans la liste des employés, l'employé dont l'id est dans le lien
        $employe = $doctrine->getManager()->getRepository(Employes::class)->find($id);

        //  Si id appartient à un employé existant, suppression
        if (!is_null($employe)) {
            $this->addFlash("efface_bon", "Employé supprimé.");
            $em = $doctrine->getManager();
            $em->remove($employe);
            $em->flush();
        } else {
            $this->addFlash("efface_err", "L'employé " . $id . " n'existe pas.");
        }

        //  Retour sur la page d'accueil
        return $this->redirectToRoute("home");
    }



    //§ =================================  MISE A JOUR EMPLOYES  ==================================

    #[Route("/update/{id}", name: "update")]
    public function update($id, ManagerRegistry $doctrine, Request $request, EmployesRepository $employes): Response
    {
        //  Recherche dans la liste des employés, l'employé dont l'id est dans le lien
        $employe = $doctrine->getManager()->getRepository(Employes::class)->find($id);
        //  Liste de tous les employés
        $employes = $employes->findAll();

        //  Si id appartient à un employé existant
        if (!is_null($employe)) {
            //  Mise en place du formulaire avec informations pré-remplis pour l'employé dont l'id est dans le lien
            $form = $this->createForm(EmployesType::class, $employe);
            $form->handleRequest($request);

            //  Si formulaire bien rempli et entré, enregistrement, et redirection vers l'accueil
            if ($form->isSubmitted() && $form->isValid()) {
                $this->addFlash("maj_bon", "Les informations de l'employé " . $id . " ont bien été mis à jour.");
                $em = $doctrine->getManager();
                $em->persist($employe);
                $em->flush();

                return $this->redirectToRoute("home");
            }
        } else {
            $this->addFlash("maj_err", "L'employé " . $id . " n'existe pas.");

            //  Retour sur la page d'accueil
            return $this->redirectToRoute("home");
        }

        //  Affichage de la page, avec trois éléments, la liste des employés, le formulaire d'ajout/modification d'un employé et la variable id
        //  id permettant de changer la couleur de la ligne correspondant à l'employé en cours de modification + titre du formulaire
        return $this->render("home/index.html.twig", ["employes" => $employes, "id" => $employe->getId(), "form" => $form->createView()]);
    }
}
