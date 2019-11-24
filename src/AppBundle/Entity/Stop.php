<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stop
 *
 * @ORM\Table(name="stop", indexes={@ORM\Index(name="fk_Stop_Cargo1_idx", columns={"CargoID"})})
 * @ORM\Entity
 */
class Stop
{
    /**
     * @var string
     *
     * @ORM\Column(name="Country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ArrivalDateTime", type="datetime", nullable=false)
     */
    private $arrivaldatetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="StopID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stopid;

    /**
     * @var \AppBundle\Entity\Cargo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CargoID", referencedColumnName="CargoID")
     * })
     */
    private $cargo;

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return \DateTime
     */
    public function getArrivaldatetime()
    {
        return $this->arrivaldatetime;
    }

    /**
     * @param \DateTime $arrivaldatetime
     */
    public function setArrivaldatetime($arrivaldatetime)
    {
        $this->arrivaldatetime = $arrivaldatetime;
    }

    /**
     * @return int
     */
    public function getStopid()
    {
        return $this->stopid;
    }

    /**
     * @param int $stopid
     */
    public function setStopid($stopid)
    {
        $this->stopid = $stopid;
    }

    /**
     * @return Cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }


}

