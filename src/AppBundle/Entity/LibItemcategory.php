<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibItemcategory
 *
 * @ORM\Table(name="lib_itemcategory")
 * @ORM\Entity
 */
class LibItemcategory
{
    /**
     * @var string
     *
     * @ORM\Column(name="Category", type="string", length=50, nullable=false)
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemCategoryID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $itemcategoryid;

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getItemcategoryid()
    {
        return $this->itemcategoryid;
    }

    /**
     * @param int $itemcategoryid
     */
    public function setItemcategoryid($itemcategoryid)
    {
        $this->itemcategoryid = $itemcategoryid;
    }


}

