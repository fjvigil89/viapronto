<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact", indexes={@ORM\Index(name="fk_Contact_Shipper_idx", columns={"ShipperID"})})
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="PhonePrimary", type="string", length=20, nullable=false)
     */
    private $phoneprimary;

    /**
     * @var string
     *
     * @ORM\Column(name="PhoneAlternate", type="string", length=20, nullable=true)
     */
    private $phonealternate;

    /**
     * @var string
     *
     * @ORM\Column(name="Country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="Province", type="string", length=45, nullable=true)
     */
    private $province;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=150, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="ZipCode", type="string", length=10, nullable=true)
     */
    private $zipcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="ContactID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contactid;

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
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getPhoneprimary()
    {
        return $this->phoneprimary;
    }

    /**
     * @param string $phoneprimary
     */
    public function setPhoneprimary($phoneprimary)
    {
        $this->phoneprimary = $phoneprimary;
    }

    /**
     * @return string
     */
    public function getPhonealternate()
    {
        return $this->phonealternate;
    }

    /**
     * @param string $phonealternate
     */
    public function setPhonealternate($phonealternate)
    {
        $this->phonealternate = $phonealternate;
    }

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
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return int
     */
    public function getContactid()
    {
        return $this->contactid;
    }

    /**
     * @param int $contactid
     */
    public function setContactid($contactid)
    {
        $this->contactid = $contactid;
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


}

