<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibCity
 *
 * @ORM\Table(name="lib_city", indexes={@ORM\Index(name="fk_Lib_City_Lib_Province1_idx", columns={"ProvinceID"})})
 * @ORM\Entity
 */
class LibCity
{
    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="CityID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cityid;

    /**
     * @var \AppBundle\Entity\LibProvince
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibProvince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ProvinceID", referencedColumnName="ProvinceID")
     * })
     */
    private $province;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getCityid()
    {
        return $this->cityid;
    }

    /**
     * @param int $cityid
     */
    public function setCityid($cityid)
    {
        $this->cityid = $cityid;
    }

    /**
     * @return LibProvince
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param LibProvince $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }


}

