<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shipment
 *
 * @ORM\Table(name="shipment", indexes={@ORM\Index(name="fk_Shipment_Lib_DeliveryOption1_idx", columns={"DeliveryOptionID"}), @ORM\Index(name="fk_Shipment_Lib_ShipmentStatus1_idx", columns={"ShipmentStatusID"}), @ORM\Index(name="fk_Shipment_Lib_DeliveryType1_idx", columns={"DeliveryTypeID"}), @ORM\Index(name="fk_Shipment_VPAgent1_idx", columns={"DeliveryAgentID"}), @ORM\Index(name="fk_Shipment_VPAgent2_idx", columns={"PickupAgentID"}), @ORM\Index(name="fk_Shipment_Shipper1_idx", columns={"ShipperID"}), @ORM\Index(name="fk_Shipment_User1_idx", columns={"HandlerID"}), @ORM\Index(name="fk_Shipment_User2_idx", columns={"ReceiverID"})})
 * @ORM\Entity
 */
class Shipment
{
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=150, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="Value", type="float", precision=10, scale=0, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="DeliveryCode", type="string", length=15, nullable=true)
     */
    private $deliverycode;

    /**
     * @var string
     *
     * @ORM\Column(name="AlternateReceiver", type="string", length=100, nullable=true)
     */
    private $alternatereceiver;

    /**
     * @var float
     *
     * @ORM\Column(name="Width", type="float", precision=10, scale=0, nullable=false)
     */
    private $width;

    /**
     * @var float
     *
     * @ORM\Column(name="Length", type="float", precision=10, scale=0, nullable=false)
     */
    private $length;

    /**
     * @var float
     *
     * @ORM\Column(name="Height", type="float", precision=10, scale=0, nullable=false)
     */
    private $height;

    /**
     * @var float
     *
     * @ORM\Column(name="Weight", type="float", precision=10, scale=0, nullable=false)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="SizeUnit", type="string", length=2, nullable=false)
     */
    private $sizeunit;

    /**
     * @var string
     *
     * @ORM\Column(name="WeightUnit", type="string", length=2, nullable=false)
     */
    private $weightunit;

    /**
     * @var string
     *
     * @ORM\Column(name="Price", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=5, nullable=false)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="Comments", type="text", length=65535, nullable=true)
     */
    private $comments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Deadline", type="datetime", nullable=true)
     */
    private $deadline;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DeliveryDate", type="datetime", nullable=true)
     */
    private $deliverydate;

    /**
     * @var string
     *
     * @ORM\Column(name="Signature1Url", type="text", length=65535, nullable=true)
     */
    private $signature1url;

    /**
     * @var string
     *
     * @ORM\Column(name="Signature2Url", type="text", length=65535, nullable=true)
     */
    private $signature2url;

    /**
     * @var integer
     *
     * @ORM\Column(name="ShipmentID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $shipmentid;

    /**
     * @var \AppBundle\Entity\LibDeliveryoption
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibDeliveryoption")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DeliveryOptionID", referencedColumnName="DeliveryOptionID")
     * })
     */
    private $deliveryoption;

    /**
     * @var \AppBundle\Entity\LibDeliverytype
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibDeliverytype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DeliveryTypeID", referencedColumnName="DeliveryTypeID")
     * })
     */
    private $deliverytype;

    /**
     * @var \AppBundle\Entity\LibShipmentstatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibShipmentstatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ShipmentStatusID", referencedColumnName="ShipmentStatusID")
     * })
     */
    private $shipmentstatus;

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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="HandlerID", referencedColumnName="UserID")
     * })
     */
    private $handler;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ReceiverID", referencedColumnName="UserID")
     * })
     */
    private $receiver;

    /**
     * @var \AppBundle\Entity\Vpagent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vpagent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DeliveryAgentID", referencedColumnName="VPAgentID")
     * })
     */
    private $deliveryagent;

    /**
     * @var \AppBundle\Entity\Vpagent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vpagent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PickupAgentID", referencedColumnName="VPAgentID")
     * })
     */
    private $pickupagent;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getDeliverycode()
    {
        return $this->deliverycode;
    }

    /**
     * @param string $deliverycode
     */
    public function setDeliverycode($deliverycode)
    {
        $this->deliverycode = $deliverycode;
    }

    /**
     * @return string
     */
    public function getAlternatereceiver()
    {
        return $this->alternatereceiver;
    }

    /**
     * @param string $alternatereceiver
     */
    public function setAlternatereceiver($alternatereceiver)
    {
        $this->alternatereceiver = $alternatereceiver;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getSizeunit()
    {
        return $this->sizeunit;
    }

    /**
     * @param string $sizeunit
     */
    public function setSizeunit($sizeunit)
    {
        $this->sizeunit = $sizeunit;
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
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param \DateTime $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * @return \DateTime
     */
    public function getDeliverydate()
    {
        return $this->deliverydate;
    }

    /**
     * @param \DateTime $deliverydate
     */
    public function setDeliverydate($deliverydate)
    {
        $this->deliverydate = $deliverydate;
    }

    /**
     * @return string
     */
    public function getSignature1url()
    {
        return $this->signature1url;
    }

    /**
     * @param string $signature1url
     */
    public function setSignature1url($signature1url)
    {
        $this->signature1url = $signature1url;
    }

    /**
     * @return string
     */
    public function getSignature2url()
    {
        return $this->signature2url;
    }

    /**
     * @param string $signature2url
     */
    public function setSignature2url($signature2url)
    {
        $this->signature2url = $signature2url;
    }

    /**
     * @return int
     */
    public function getShipmentid()
    {
        return $this->shipmentid;
    }

    /**
     * @param int $shipmentid
     */
    public function setShipmentid($shipmentid)
    {
        $this->shipmentid = $shipmentid;
    }

    /**
     * @return LibDeliveryoption
     */
    public function getDeliveryoption()
    {
        return $this->deliveryoption;
    }

    /**
     * @param LibDeliveryoption $deliveryoption
     */
    public function setDeliveryoption($deliveryoption)
    {
        $this->deliveryoption = $deliveryoption;
    }

    /**
     * @return LibDeliverytype
     */
    public function getDeliverytype()
    {
        return $this->deliverytype;
    }

    /**
     * @param LibDeliverytype $deliverytype
     */
    public function setDeliverytype($deliverytype)
    {
        $this->deliverytype = $deliverytype;
    }

    /**
     * @return LibShipmentstatus
     */
    public function getShipmentstatus()
    {
        return $this->shipmentstatus;
    }

    /**
     * @param LibShipmentstatus $shipmentstatus
     */
    public function setShipmentstatus($shipmentstatus)
    {
        $this->shipmentstatus = $shipmentstatus;
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

    /**
     * @return User
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param User $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return Vpagent
     */
    public function getDeliveryagent()
    {
        return $this->deliveryagent;
    }

    /**
     * @param Vpagent $deliveryagent
     */
    public function setDeliveryagent($deliveryagent)
    {
        $this->deliveryagent = $deliveryagent;
    }

    /**
     * @return Vpagent
     */
    public function getPickupagent()
    {
        return $this->pickupagent;
    }

    /**
     * @param Vpagent $pickupagent
     */
    public function setPickupagent($pickupagent)
    {
        $this->pickupagent = $pickupagent;
    }


}

