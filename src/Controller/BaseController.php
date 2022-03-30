<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Form\AvisType;
use App\Form\CantineType;
use App\Form\CarteIdentiteType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Entity\Contact;
use App\Entity\Avis;
use App\Entity\Cantine;
use App\Entity\CarteIdentite;
use Symfony\Component\Mime\Email;

class BaseController extends AbstractController
{   //page d'accueil du site de la ville d'arras
    #[Route('/index', name: 'index')]
    public function index(Request $request, MailerInterface $mailer): Response
    {  
        $avis = new Avis();
        $form = $this->createForm(AvisType::class,$avis);

        $repoavis= $this->getDoctrine()->getRepository(Avis::class);
        $aviss=$repoavis->findAll();


        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $avis->setDate(new \Datetime());
                $email = (new TemplatedEmail())
                ->context([
                    'prenom'=>$avis->getprenom(),
                    'nom'=>$avis->getnom(),
                    'avis'=>$avis->getavis(),
                    'note'=>$avis->getnote(),
                    'date'=>$avis->getdate(),
                ]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($avis);
                $em->flush();
                $this->addFlash('notice','Message pour votre avis');
                return $this->redirectToRoute('index');

            }
        }
            return $this->render('base/index.html.twig', [
            'avis'=>$aviss,
          'form' => $form->createView()
        ]);
    }

    //Page de contact de la ville d'Arras         //test pour vérifier l'envoie
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){   
                $email = (new TemplatedEmail())
                ->from($form->get('email')->getData())
                ->to('olivier.lohezz@gmail.com')
                ->subject($form->get('sujet')->getData())
                ->htmlTemplate('emails/email.html.twig')
                ->context([
                    'nom'=> $form->get('nom')->getData(),
                    'sujet'=> $form->get('sujet')->getData(),
                    'message'=> $form->get('message')->getData()
                ]);
              
                $mailer->send($email);
                $this->addFlash('notice','Merci pour votre mail');
                return $this->redirectToRoute('contact');
            }
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    #[Route('/private-liste-contacts', name: 'liste-contacts')]
        public function listeContacts(): Response    
        {	
        $repoContact = $this->getDoctrine()->getRepository(Contact::class);
        $contacts = $repoContact->findAll();        
        return $this->render('contact/liste-contacts.html.twig', [           
            'contacts' => $contacts        
        ]);    
    }


    //page de la Presentation de la ville d'Arras
    #[Route('/presentation', name: 'presentation')]
    public function presentation(): Response
    {
        return $this->render('base/presentation.html.twig', [
            
        ]);
    }

    #[Route('/cantine', name: 'cantine')]
    public function cantine(Request $request,MailerInterface $mailer): Response
    {
        $cantine = new Cantine();
        $form = $this->createForm(CantineType::class,$cantine);
        

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $cantine->setJourRepas(new \Datetime());
                $email = (new TemplatedEmail())
                ->context([
                    'Nom'=>$cantine->getPrenom(),
                    'Prenom'=>$cantine->getNom(),
                    'Email'=>$cantine->getEmail(),
                    'NomEcole'=>$cantine->getNomEcole(),
                    'JourRepas'=>$cantine->getJourRepas(),
                ]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($cantine);
                $em->flush();
                $this->addFlash('notice','Message recu,nous le traiterons dans les plus brefs délais');
                return $this->redirectToRoute('cantine');
            }
        }

        return $this->render('base/cantine.html.twig', [
      'form' => $form->createView()
        ]);
    }

    #[Route('/private-liste-cantine', name: 'liste-cantine')]
        public function listeCantine(): Response    
        {
        $repoCantine = $this->getDoctrine()->getRepository(Cantine::class);
        $cantine = $repoCantine->findAll();        
        return $this->render('cantine/liste-cantine.html.twig', [           
            'cantine' => $cantine        
        ]);    
    }

    

    #[Route('/carteidentite', name: 'carteidentite')]
    public function carteidentite(Request $request,MailerInterface $mailer): Response
    {
        $carteidentite = new CarteIdentite();
        $form = $this->createForm(CarteIdentiteType::class,$carteidentite);
        

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $carteidentite->setDateNaissance(new \Datetime());
                $email = (new TemplatedEmail())
                ->context([
                    'nom'=>$carteidentite->getPrenom(),
                    'prenom'=>$carteidentite->getNom(),
                    'DateNaissance'=>$carteidentite->getDateNaissance(),
                    'LieuNaissance'=>$carteidentite->getLieuNaissance(),
                    'Rue'=>$carteidentite->getRue(),
                    'Ville'=>$carteidentite->getVille(),
                    'CP'=>$carteidentite->getCP(),
                ]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($carteidentite);
                $em->flush();
                $this->addFlash('notice','Message recu,nous le traiterons dans les plus brefs délais');
                return $this->redirectToRoute('carteidentite');
            }
        }

        return $this->render('base/carteidentite.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/private-liste-carteidentite', name: 'liste-carteidentite')]
        public function listeCarteidentite(): Response    
        {
        $repoCarteidentite = $this->getDoctrine()->getRepository(CarteIdentite::class);
        $Carteidentite = $repoCarteidentite->findAll();        
        return $this->render('carteidentite/liste-carteidentite.html.twig', [           
            'carteidentite' => $Carteidentite        
        ]);    
    }
}