<?php

namespace mgate\SuiviBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mgate\SuiviBundle\Entity\Mission
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="mgate\SuiviBundle\Entity\MissionRepository")
 */
class Mission extends DocType
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Etude", inversedBy="missions", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $etude;

    /** , inversedBy="missions", cascade={"persist"}
     * @ORM\ManyToOne(targetEntity="mgate\PersonneBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $intervenant;

    /**
     * @var \DateTime $debutOm
     *
     * @ORM\Column(name="debutOm", type="datetime")
     */
    private $debutOm;

    /**
     * @var \DateTime $finOm
     *
     * @ORM\Column(name="finOm", type="datetime")
     */
    private $finOm;

    /**
     * @var integer $avancement
     *
     * @ORM\Column(name="avancement", type="integer")
     */
    private $avancement;

    /**
     * @var boolean $rapportDemande
     *
     * @ORM\Column(name="rapportDemande", type="boolean")
     */
    private $rapportDemande;

    /**
     * @var boolean $rapportRelu
     *
     * @ORM\Column(name="rapportRelu", type="boolean")
     */
    private $rapportRelu;

    /**
     * @var boolean $remunere
     *
     * @ORM\Column(name="remunere", type="boolean")
     */
    private $remunere;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set intervenant
     *
     * @param mgate\PersonneBundle\Entity\User $intervenant
     * @return Mission
     */
    public function setIntervenant(mgate\PersonneBundle\Entity\User $intervenant)
    {
        $this->intervenant = $intervenant;
    
        return $this;
    }

    /**
     * Get intervenant
     *
     * @return mgate\PersonneBundle\Entity\User 
     */
    public function getIntervenant()
    {
        return $this->intervenant;
    }

    /**
     * Set debutOm
     *
     * @param \DateTime $debutOm
     * @return Mission
     */
    public function setDebutOm($debutOm)
    {
        $this->debutOm = $debutOm;
    
        return $this;
    }

    /**
     * Get debutOm
     *
     * @return \DateTime 
     */
    public function getDebutOm()
    {
        return $this->debutOm;
    }

    /**
     * Set finOm
     *
     * @param \DateTime $finOm
     * @return Mission
     */
    public function setFinOm($finOm)
    {
        $this->finOm = $finOm;
    
        return $this;
    }

    /**
     * Get finOm
     *
     * @return \DateTime 
     */
    public function getFinOm()
    {
        return $this->finOm;
    }

    /**
     * Set avancement
     *
     * @param integer $avancement
     * @return Mission
     */
    public function setAvancement($avancement)
    {
        $this->avancement = $avancement;
    
        return $this;
    }

    /**
     * Get avancement
     *
     * @return integer 
     */
    public function getAvancement()
    {
        return $this->avancement;
    }

    /**
     * Set rapportDemande
     *
     * @param boolean $rapportDemande
     * @return Mission
     */
    public function setRapportDemande($rapportDemande)
    {
        $this->rapportDemande = $rapportDemande;
    
        return $this;
    }

    /**
     * Get rapportDemande
     *
     * @return boolean 
     */
    public function getRapportDemande()
    {
        return $this->rapportDemande;
    }

    /**
     * Set rapportRelu
     *
     * @param boolean $rapportRelu
     * @return Mission
     */
    public function setRapportRelu($rapportRelu)
    {
        $this->rapportRelu = $rapportRelu;
    
        return $this;
    }

    /**
     * Get rapportRelu
     *
     * @return boolean 
     */
    public function getRapportRelu()
    {
        return $this->rapportRelu;
    }

    /**
     * Set remunere
     *
     * @param boolean $remunere
     * @return Mission
     */
    public function setRemunere($remunere)
    {
        $this->remunere = $remunere;
    
        return $this;
    }

    /**
     * Get remunere
     *
     * @return boolean 
     */
    public function getRemunere()
    {
        return $this->remunere;
    }

    /**
     * Set etude
     *
     * @param mgate\SuiviBundle\Entity\Etude $etude
     * @return Mission
     */
    public function setEtude(\mgate\SuiviBundle\Entity\Etude $etude)
    {
        $this->etude = $etude;
    
        return $this;
    }

    /**
     * Get etude
     *
     * @return mgate\SuiviBundle\Entity\Etude 
     */
    public function getEtude()
    {
        return $this->etude;
    }
}