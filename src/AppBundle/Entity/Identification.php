<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Identification
 *
 * @ORM\Table(name="identification", indexes={@ORM\Index(name="fk_ShipperIdentification_Shipper1_idx", columns={"UserID"})})
 * @ORM\Entity
 */
class Identification
{
    /**
     * @var string
     *
     * @ORM\Column(name="IDType", type="string", length=50, nullable=false)
     */
    private $idtype;

    /**
     * @var string
     *
     * @ORM\Column(name="IDNumber", type="string", length=50, nullable=true)
     */
    private $idnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="IDPictureUrl", type="string", length=150, nullable=true)
     */
    private $idpictureurl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IDVerified", type="boolean", nullable=true)
     */
    private $idverified = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="IdentificationId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identificationid;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UserID", referencedColumnName="UserID")
     * })
     */
    private $user;

    /**
     * @return string
     */
    public function getIdtype()
    {
        return $this->idtype;
    }

    /**
     * @param string $idtype
     */
    public function setIdtype($idtype)
    {
        $this->idtype = $idtype;
    }

    /**
     * @return string
     */
    public function getIdnumber()
    {
        return $this->idnumber;
    }

    /**
     * @param string $idnumber
     */
    public function setIdnumber($idnumber)
    {
        $this->idnumber = $idnumber;
    }

    /**
     * @return string
     */
    public function getIdpictureurl()
    {
        return $this->idpictureurl;
    }

    /**
     * @param string $idpictureurl
     */
    public function setIdpictureurl($idpictureurl)
    {
        $this->idpictureurl = $idpictureurl;
    }

    /**
     * @return bool
     */
    public function isIdverified()
    {
        return $this->idverified;
    }

    /**
     * @param bool $idverified
     */
    public function setIdverified($idverified)
    {
        $this->idverified = $idverified;
    }

    /**
     * @return int
     */
    public function getIdentificationid()
    {
        return $this->identificationid;
    }

    /**
     * @param int $identificationid
     */
    public function setIdentificationid($identificationid)
    {
        $this->identificationid = $identificationid;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}

