<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item", indexes={@ORM\Index(name="fk_Item_Shipment1_idx", columns={"ShipmentID"}), @ORM\Index(name="fk_Item_Lib_ItemCategory1_idx", columns={"ItemCategoryID"})})
 * @ORM\Entity
 */
class Item
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="Quantity", type="boolean", nullable=false)
     */
    private $quantity = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=150, nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Fragile", type="boolean", nullable=false)
     */
    private $fragile = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $itemid;

    /**
     * @var integer
     *
     * @ORM\Column(name="CategoryID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoryid;

    /**
     * @var \AppBundle\Entity\LibItemcategory
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibItemcategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ItemCategoryID", referencedColumnName="ItemCategoryID")
     * })
     */
    private $itemcategoryid;

    /**
     * @var \AppBundle\Entity\Shipment
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Shipment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ShipmentID", referencedColumnName="ShipmentID")
     * })
     */
    private $shipmentid;


}

