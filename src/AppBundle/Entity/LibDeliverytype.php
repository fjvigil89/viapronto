<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibDeliverytype
 *
 * @ORM\Table(name="lib_deliverytype")
 * @ORM\Entity
 */
class LibDeliverytype
{
    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=25, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="DeliveryTypeID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $deliverytypeid;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getDeliverytypeid()
    {
        return $this->deliverytypeid;
    }

    /**
     * @param int $deliverytypeid
     */
    public function setDeliverytypeid($deliverytypeid)
    {
        $this->deliverytypeid = $deliverytypeid;
    }


}

