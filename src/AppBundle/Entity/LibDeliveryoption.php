<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibDeliveryoption
 *
 * @ORM\Table(name="lib_deliveryoption")
 * @ORM\Entity
 */
class LibDeliveryoption
{
    /**
     * @var string
     *
     * @ORM\Column(name="Option", type="string", length=25, nullable=false)
     */
    private $option;

    /**
     * @var integer
     *
     * @ORM\Column(name="DeliveryOptionID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $deliveryoptionid;

    /**
     * @return string
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param string $option
     */
    public function setOption($option)
    {
        $this->option = $option;
    }

    /**
     * @return int
     */
    public function getDeliveryoptionid()
    {
        return $this->deliveryoptionid;
    }

    /**
     * @param int $deliveryoptionid
     */
    public function setDeliveryoptionid($deliveryoptionid)
    {
        $this->deliveryoptionid = $deliveryoptionid;
    }


}

