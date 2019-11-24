<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibBusinesstype
 *
 * @ORM\Table(name="lib_businesstype")
 * @ORM\Entity
 */
class LibBusinesstype
{
    /**
     * @var string
     *
     * @ORM\Column(name="BusinessType", type="string", length=50, nullable=false)
     */
    private $businesstype;

    /**
     * @var integer
     *
     * @ORM\Column(name="BusinessTypeID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $businesstypeid;

    /**
     * @return string
     */
    public function getBusinesstype()
    {
        return $this->businesstype;
    }

    /**
     * @param string $businesstype
     */
    public function setBusinesstype($businesstype)
    {
        $this->businesstype = $businesstype;
    }

    /**
     * @return int
     */
    public function getBusinesstypeid()
    {
        return $this->businesstypeid;
    }

    /**
     * @param int $businesstypeid
     */
    public function setBusinesstypeid($businesstypeid)
    {
        $this->businesstypeid = $businesstypeid;
    }


}

