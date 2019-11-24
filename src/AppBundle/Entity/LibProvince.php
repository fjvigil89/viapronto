<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibProvince
 *
 * @ORM\Table(name="lib_province", indexes={@ORM\Index(name="fk_Lib_Province_Lib_Country1_idx", columns={"CountryID"})})
 * @ORM\Entity
 */
class LibProvince
{
    /**
     * @var string
     *
     * @ORM\Column(name="Province", type="string", length=45, nullable=true)
     */
    private $province;

    /**
     * @var integer
     *
     * @ORM\Column(name="ProvinceID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $provinceid;

    /**
     * @var string
     *
     * @ORM\Column(name="StateCode", type="string", length=5, nullable=true)
     */
    private $statecode;

    /**
     * @var \AppBundle\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CountryID", referencedColumnName="CountryID")
     * })
     */
    private $country;

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return int
     */
    public function getProvinceid()
    {
        return $this->provinceid;
    }

    /**
     * @param int $provinceid
     */
    public function setProvinceid($provinceid)
    {
        $this->provinceid = $provinceid;
    }

    /**
     * @return string
     */
    public function getStatecode()
    {
        return $this->statecode;
    }

    /**
     * @param string $statecode
     */
    public function setStatecode($statecode)
    {
        $this->statecode = $statecode;
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }


}

