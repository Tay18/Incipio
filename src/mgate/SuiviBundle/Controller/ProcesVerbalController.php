<?php

namespace mgate\SuiviBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use mgate\SuiviBundle\Form\EtudeType;

use mgate\SuiviBundle\Entity\ProcesVerbal;
use mgate\SuiviBundle\Form\ProcesVerbalType;
use mgate\SuiviBundle\Form\ProcesVerbalSubType;


class ProcesVerbalController extends Controller
{
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('mgateSuiviBundle:Etude')->findAll();

        return $this->render('mgateSuiviBundle:Etude:index.html.twig', array(
            'etudes' => $entities,
        ));
         
    }  
    
    public function addAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        if( ! $etude = $em->getRepository('mgate\SuiviBundle\Entity\Etude')->find($id) )
        {
            throw $this->createNotFoundException('Etude[id='.$id.'] inexistant');
        }
        
        
        $proces = new ProcesVerbal;
        $proces->setType("pvi");
        $etude->addPvi($proces);
        
        $form = $this->createForm(new ProcesVerbalSubType, $proces, array('type' => 'pvi', 'prospect' => $etude->getProspect()));      
        if( $this->get('request')->getMethod() == 'POST' )
        {
            $form->bindRequest($this->get('request'));

            if( $form->isValid() )
            {
                $em->persist($proces);
                $em->flush();
                
                return $this->redirect( $this->generateUrl('mgateSuivi_procesverbal_voir', array('id' => $proces->getId())) );
            }
        }

        return $this->render('mgateSuiviBundle:ProcesVerbal:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function voirAction($id)
    {
       $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('mgateSuiviBundle:ProcesVerbal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProcesVerbal entity.');
        }

        //$deleteForm = $this->createDeleteForm($id);

        return $this->render('mgateSuiviBundle:ProcesVerbal:voir.html.twig', array(
            'procesverbal'      => $entity,
            /*'delete_form' => $deleteForm->createView(),  */      ));
        
    }
    
    public function modifierAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        if( ! $procesverbal = $em->getRepository('mgate\SuiviBundle\Entity\ProcesVerbal')->find($id) )
        {
            throw $this->createNotFoundException('ProcesVerbal[id='.$id.'] inexistant');
        }
        
        //$procesverbal->getEtude()
        //aah
        
        
        return $this->redigerAction($procesverbal->getEtude()->getId(), $procesverbal->getType(), 0);

    }
    
    
    public function redigerAction($id, $type, $keyPv)
    {
        $em = $this->getDoctrine()->getEntityManager();

        if( ! $etude = $em->getRepository('mgate\SuiviBundle\Entity\Etude')->find($id) )
        {
            throw $this->createNotFoundException('Etude[id='.$id.'] inexistant');
        }

        if(!$procesverbal = $etude->getDoc($type))
        {
            $procesverbal = new ProcesVerbal;
            if(strtoupper($type)=="PVR")
            {
                $etude->setPvr($procesverbal);
            }

            $procesverbal->setType($type);
        }
        
        $form = $this->createForm(new ProcesVerbalType, $etude, array('type' => $type, 'prospect' => $etude->getProspect()));
        if( $this->get('request')->getMethod() == 'POST' )
        {
            $form->bindRequest($this->get('request'));
            
            if( $form->isValid() )
            {
                
                $em->persist($etude);
                $em->flush();
                return $this->redirect( $this->generateUrl('mgateSuivi_procesverbal_voir', array('id' => $procesverbal->getId())) );
            }
                
        }

        return $this->render('mgateSuiviBundle:ProcesVerbal:rediger.html.twig', array(
            'form' => $form->createView(),
            'etude' => $etude,
            'type' => $type,
        ));
    }
}
