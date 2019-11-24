<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var string
     *
     * @ORM\Column(name="Country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="CountryID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryid;

    /**
     * @var string
     *
     * @ORM\Column(name="CountryISO2", type="string", length=5, nullable=false)
     */
    private $countryiso2;

    /**
     * @var string
     *
     * @ORM\Column(name="CountryISO3", type="string", length=5, nullable=false)
     */
    private $countryiso3;

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getCountryid()
    {
        return $this->countryid;
    }

    /**
     * @param int $countryid
     */
    public function setCountryid($countryid)
    {
        $this->countryid = $countryid;
    }

    /**
     * @return string
     */
    public function getCountryiso2()
    {
        return $this->countryiso2;
    }

    /**
     * @param string $countryiso2
     */
    public function setCountryiso2($countryiso2)
    {
        $this->countryiso2 = $countryiso2;
    }

    /**
     * @return string
     */
    public function getCountryiso3()
    {
        return $this->countryiso3;
    }

    /**
     * @param string $countryiso3
     */
    public function setCountryiso3($countryiso3)
    {
        $this->countryiso3 = $countryiso3;
    }


}

