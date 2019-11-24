<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="cargo", indexes={@ORM\Index(name="fk_Cargo_User1_idx", columns={"HandlerID"})})
 * @ORM\Entity
 */
class Cargo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FlightNumber", type="integer", nullable=true)
     */
    private $flightnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="Airline", type="string", length=50, nullable=true)
     */
    private $airline;

    /**
     * @var string
     *
     * @ORM\Column(name="DepartureCountry", type="string", length=50, nullable=false)
     */
    private $departurecountry;

    /**
     * @var string
     *
     * @ORM\Column(name="DepartureCity", type="string", length=50, nullable=false)
     */
    private $departurecity;

    /**
     * @var string
     *
     * @ORM\Column(name="DestinationCountry", type="string", length=50, nullable=false)
     */
    private $destinationcountry;

    /**
     * @var string
     *
     * @ORM\Column(name="DestinationCity", type="string", length=50, nullable=false)
     */
    private $destinationcity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DepartureDateTime", type="datetime", nullable=false)
     */
    private $departuredatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ArrivalDateTime", type="datetime", nullable=true)
     */
    private $arrivaldatetime;

    /**
     * @var float
     *
     * @ORM\Column(name="WeightAvailable", type="float", precision=10, scale=0, nullable=false)
     */
    private $weightavailable;

    /**
     * @var string
     *
     * @ORM\Column(name="WeightUnit", type="string", length=2, nullable=false)
     */
    private $weightunit;

    /**
     * @var integer
     *
     * @ORM\Column(name="CargoID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cargoid;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="HandlerID", referencedColumnName="UserID")
     * })
     */
    private $handler;

    /**
     * @return int
     */
    public function getFlightnumber()
    {
        return $this->flightnumber;
    }

    /**
     * @param int $flightnumber
     */
    public function setFlightnumber($flightnumber)
    {
        $this->flightnumber = $flightnumber;
    }

    /**
     * @return string
     */
    public function getAirline()
    {
        return $this->airline;
    }

    /**
     * @param string $airline
     */
    public function setAirline($airline)
    {
        $this->airline = $airline;
    }

    /**
     * @return string
     */
    public function getDeparturecountry()
    {
        return $this->departurecountry;
    }

    /**
     * @param string $departurecountry
     */
    public function setDeparturecountry($departurecountry)
    {
        $this->departurecountry = $departurecountry;
    }

    /**
     * @return string
     */
    public function getDeparturecity()
    {
        return $this->departurecity;
    }

    /**
     * @param string $departurecity
     */
    public function setDeparturecity($departurecity)
    {
        $this->departurecity = $departurecity;
    }

    /**
     * @return string
     */
    public function getDestinationcountry()
    {
        return $this->destinationcountry;
    }

    /**
     * @param string $destinationcountry
     */
    public function setDestinationcountry($destinationcountry)
    {
        $this->destinationcountry = $destinationcountry;
    }

    /**
     * @return string
     */
    public function getDestinationcity()
    {
        return $this->destinationcity;
    }

    /**
     * @param string $destinationcity
     */
    public function setDestinationcity($destinationcity)
    {
        $this->destinationcity = $destinationcity;
    }

    /**
     * @return \DateTime
     */
    public function getDeparturedatetime()
    {
        return $this->departuredatetime;
    }

    /**
     * @param \DateTime $departuredatetime
     */
    public function setDeparturedatetime($departuredatetime)
    {
        $this->departuredatetime = $departuredatetime;
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
     * @return float
     */
    public function getWeightavailable()
    {
        return $this->weightavailable;
    }

    /**
     * @param float $weightavailable
     */
    public function setWeightavailable($weightavailable)
    {
        $this->weightavailable = $weightavailable;
    }

    /**
     * @return string
     */
    public function getWeightunit()
    {
        return $this->weightunit;
    }

    /**
     * @param string $weightunit
     */
    public function setWeightunit($weightunit)
    {
        $this->weightunit = $weightunit;
    }

    /**
     * @return int
     */
    public function getCargoid()
    {
        return $this->cargoid;
    }

    /**
     * @param int $cargoid
     */
    public function setCargoid($cargoid)
    {
        $this->cargoid = $cargoid;
    }

    /**
     * @return User
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param User $handler
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }


}

