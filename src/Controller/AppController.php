<?php
namespace App\Controller;

use App\Entity\Projet;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\ProjetType;
use App\Repository\ProjetRepository;

class AppController extends AbstractController
{
    /**
     * @Route("/index", name="homepage")
     */
    public function index()
    {
        // recherche avec 2 paramètres
        $projet = $this->getDoctrine()
            ->getRepository(Projet::class)
            ->findAll();
        

        return $this->render('index.html.twig', [
            'projet' => $projet,
        ]);
    }

    /**
     * @Route("/form", name="form")
     */
    public function form(Request $request)
    {
        $projet = new Projet();
        
        $par = $this->getDoctrine()
            ->getRepository(Projet::class)
            ->getParents();

        foreach($par as $arr) {
            foreach($arr as $p ) {
                $parents[] = $p;   
            }
        }

        $ava = $this->getDoctrine()
            ->getRepository(Projet::class)
            ->getAvancement();

        foreach($ava as $arr2) {
            foreach($arr2 as $i ) {
                $avancement[] = $i;   
            }
        }

        $formOptions = array('parents' => $parents, 'avancement' => $avancement);


        $form = $this->createForm(ProjetType::class, $projet, $formOptions);

        $form->handleRequest($request);
        $result = null;
        $avance = null;
        if ($form->isSubmitted() && $form->isValid())
        {
            $parent = $form->getData()->getParent();
            $avance = $form->getData()->getAvancement();
            
            $result = $this->getDoctrine()
            ->getRepository(Projet::class)
            ->getProjets($parent,$avance);
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView(),
            'avancement' => $avancement,
            'parent' => $parents,
            'result' => $result,
        ]);
    }
}