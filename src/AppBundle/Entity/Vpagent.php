<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vpagent
 *
 * @ORM\Table(name="vpagent", indexes={@ORM\Index(name="fk_VPAgent_Lib_BusinessType1_idx", columns={"BusinessTypeID"}), @ORM\Index(name="fk_VPAgent_Lib_AgentAccountStatus1_idx", columns={"AccountStatusID"})})
 * @ORM\Entity
 */
class Vpagent
{
    /**
     * @var string
     *
     * @ORM\Column(name="StoreName", type="string", length=150, nullable=false)
     */
    private $storename;

    /**
     * @var string
     *
     * @ORM\Column(name="Manager", type="string", length=100, nullable=false)
     */
    private $manager;

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
     * @var string
     *
     * @ORM\Column(name="AccountNumber", type="string", length=20, nullable=true)
     */
    private $accountnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="Login", type="string", length=50, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=150, nullable=true)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="VPAgentID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vpagentid;

    /**
     * @var \AppBundle\Entity\LibAgentaccountstatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibAgentaccountstatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="AccountStatusID", referencedColumnName="AccountStatusID")
     * })
     */
    private $accountstatus;

    /**
     * @var \AppBundle\Entity\LibBusinesstype
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibBusinesstype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="BusinessTypeID", referencedColumnName="BusinessTypeID")
     * })
     */
    private $businesstype;

    /**
     * @return string
     */
    public function getStorename()
    {
        return $this->storename;
    }

    /**
     * @param string $storename
     */
    public function setStorename($storename)
    {
        $this->storename = $storename;
    }

    /**
     * @return string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param string $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
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
     * @return string
     */
    public function getAccountnumber()
    {
        return $this->accountnumber;
    }

    /**
     * @param string $accountnumber
     */
    public function setAccountnumber($accountnumber)
    {
        $this->accountnumber = $accountnumber;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getVpagentid()
    {
        return $this->vpagentid;
    }

    /**
     * @param int $vpagentid
     */
    public function setVpagentid($vpagentid)
    {
        $this->vpagentid = $vpagentid;
    }

    /**
     * @return LibAgentaccountstatus
     */
    public function getAccountstatus()
    {
        return $this->accountstatus;
    }

    /**
     * @param LibAgentaccountstatus $accountstatus
     */
    public function setAccountstatus($accountstatus)
    {
        $this->accountstatus = $accountstatus;
    }

    /**
     * @return LibBusinesstype
     */
    public function getBusinesstype()
    {
        return $this->businesstype;
    }

    /**
     * @param LibBusinesstype $businesstype
     */
    public function setBusinesstype($businesstype)
    {
        $this->businesstype = $businesstype;
    }


}

