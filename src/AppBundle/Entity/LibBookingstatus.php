<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibBookingstatus
 *
 * @ORM\Table(name="lib_bookingstatus")
 * @ORM\Entity
 */
class LibBookingstatus
{
    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=20, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="BookingStatusID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bookingstatusid;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getBookingstatusid()
    {
        return $this->bookingstatusid;
    }

    /**
     * @param int $bookingstatusid
     */
    public function setBookingstatusid($bookingstatusid)
    {
        $this->bookingstatusid = $bookingstatusid;
    }


}

