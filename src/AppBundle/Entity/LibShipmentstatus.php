<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibShipmentstatus
 *
 * @ORM\Table(name="lib_shipmentstatus")
 * @ORM\Entity
 */
class LibShipmentstatus
{
    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=25, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="ShipmentStatusID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $shipmentstatusid;

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
    public function getShipmentstatusid()
    {
        return $this->shipmentstatusid;
    }

    /**
     * @param int $shipmentstatusid
     */
    public function setShipmentstatusid($shipmentstatusid)
    {
        $this->shipmentstatusid = $shipmentstatusid;
    }


}

