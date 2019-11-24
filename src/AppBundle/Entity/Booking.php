<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking", indexes={@ORM\Index(name="fk_Booking_Cargo1_idx", columns={"CargoID"}), @ORM\Index(name="fk_Booking_User1_idx", columns={"ShipperID"}), @ORM\Index(name="fk_Booking_Lib_BookingStatus1_idx", columns={"BookingStatusID"})})
 * @ORM\Entity
 */
class Booking
{
    /**
     * @var string
     *
     * @ORM\Column(name="DepositAmount", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $depositamount;

    /**
     * @var string
     *
     * @ORM\Column(name="CCNumber", type="string", length=20, nullable=false)
     */
    private $ccnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="BookingID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bookingid;

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
     * @var \AppBundle\Entity\LibBookingstatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibBookingstatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="BookingStatusID", referencedColumnName="BookingStatusID")
     * })
     */
    private $bookingstatusid;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ShipperID", referencedColumnName="UserID")
     * })
     */
    private $shipper;

    /**
     * @return string
     */
    public function getDepositamount()
    {
        return $this->depositamount;
    }

    /**
     * @param string $depositamount
     */
    public function setDepositamount($depositamount)
    {
        $this->depositamount = $depositamount;
    }

    /**
     * @return string
     */
    public function getCcnumber()
    {
        return $this->ccnumber;
    }

    /**
     * @param string $ccnumber
     */
    public function setCcnumber($ccnumber)
    {
        $this->ccnumber = $ccnumber;
    }

    /**
     * @return int
     */
    public function getBookingid()
    {
        return $this->bookingid;
    }

    /**
     * @param int $bookingid
     */
    public function setBookingid($bookingid)
    {
        $this->bookingid = $bookingid;
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

    /**
     * @return LibBookingstatus
     */
    public function getBookingstatusid()
    {
        return $this->bookingstatusid;
    }

    /**
     * @param LibBookingstatus $bookingstatusid
     */
    public function setBookingstatusid($bookingstatusid)
    {
        $this->bookingstatusid = $bookingstatusid;
    }

    /**
     * @return User
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param User $shipper
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;
    }


}

