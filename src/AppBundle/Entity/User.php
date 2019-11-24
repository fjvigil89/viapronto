<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Serializable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="fk_Shipper_Lib_ShipperAccountStatus1_idx", columns={"AccountStatusID"}), @ORM\Index(name="fk_User_Lib_PaymentMethod1_idx", columns={"PaymentMethodID"}), @ORM\Index(name="fk_User_Lib_City1_idx", columns={"CityID"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->isActive
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive
            ) = unserialize($serialized);
    }

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Please provide a first name")
     * @ORM\Column(name="FirstName", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Please provide a last name")
     * @ORM\Column(name="LastName", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Please provide an email address")
     * @ORM\Column(name="Email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="PhonePrimary", type="string", length=20, nullable=true)
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
     * @ORM\Column(name="CommunicationPreference", type="string", length=20, nullable=true)
     */
    private $communicationpreference;

    /**
     * @var string
     *
     * @ORM\Column(name="PreferredLanguage", type="string", length=15, nullable=true)
     */
    private $preferredlanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=150, nullable=true)
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
     * @ORM\Column(name="CCNameOnCard", type="string", length=100, nullable=true)
     */
    private $ccnameoncard;

    /**
     * @var string
     *
     * @ORM\Column(name="CCNumber", type="string", length=20, nullable=true)
     */
    private $ccnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="BankNumber", type="string", length=45, nullable=true)
     */
    private $banknumber;

    /**
     * @var string
     *
     * @ORM\Column(name="BankName", type="string", length=45, nullable=true)
     */
    private $bankname;

    /**
     * @var string
     *
     * @ORM\Column(name="BranchNumber", type="string", length=20, nullable=true)
     */
    private $branchnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="AccountNumber", type="string", length=20, nullable=true)
     */
    private $accountnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="UserID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var \AppBundle\Entity\LibAccountstatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibAccountstatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="AccountStatusID", referencedColumnName="AccountStatusID")
     * })
     */
    private $accountstatus;

    /**
     * @var \AppBundle\Entity\LibCity
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibCity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CityID", referencedColumnName="CityID")
     * })
     */
    private $cityid;

    /**
     * @var \AppBundle\Entity\LibPaymentmethod
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibPaymentmethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PaymentMethodID", referencedColumnName="PaymentMethodID")
     * })
     */
    private $paymentmethod;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getCommunicationpreference()
    {
        return $this->communicationpreference;
    }

    /**
     * @param string $communicationpreference
     */
    public function setCommunicationpreference($communicationpreference)
    {
        $this->communicationpreference = $communicationpreference;
    }

    /**
     * @return string
     */
    public function getPreferredlanguage()
    {
        return $this->preferredlanguage;
    }

    /**
     * @param string $preferredlanguage
     */
    public function setPreferredlanguage($preferredlanguage)
    {
        $this->preferredlanguage = $preferredlanguage;
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
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getCcnameoncard()
    {
        return $this->ccnameoncard;
    }

    /**
     * @param string $ccnameoncard
     */
    public function setCcnameoncard($ccnameoncard)
    {
        $this->ccnameoncard = $ccnameoncard;
    }

    /**
     * @return string
     */
    public function getCcnumber()
    {
        return $this->ccnumber;
    }

    /**
     * @param string $ccnumber
     */
    public function setCcnumber($ccnumber)
    {
        $this->ccnumber = $ccnumber;
    }

    /**
     * @return string
     */
    public function getBanknumber()
    {
        return $this->banknumber;
    }

    /**
     * @param string $banknumber
     */
    public function setBanknumber($banknumber)
    {
        $this->banknumber = $banknumber;
    }

    /**
     * @return string
     */
    public function getBankname()
    {
        return $this->bankname;
    }

    /**
     * @param string $bankname
     */
    public function setBankname($bankname)
    {
        $this->bankname = $bankname;
    }

    /**
     * @return string
     */
    public function getBranchnumber()
    {
        return $this->branchnumber;
    }

    /**
     * @param string $branchnumber
     */
    public function setBranchnumber($branchnumber)
    {
        $this->branchnumber = $branchnumber;
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
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param int $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return LibAccountstatus
     */
    public function getAccountstatus()
    {
        return $this->accountstatus;
    }

    /**
     * @param LibAccountstatus $accountstatus
     */
    public function setAccountstatus($accountstatus)
    {
        $this->accountstatus = $accountstatus;
    }

    /**
     * @return LibCity
     */
    public function getCityid()
    {
        return $this->cityid;
    }

    /**
     * @param LibCity $cityid
     */
    public function setCityid($cityid)
    {
        $this->cityid = $cityid;
    }

    /**
     * @return LibPaymentmethod
     */
    public function getPaymentmethod()
    {
        return $this->paymentmethod;
    }

    /**
     * @param LibPaymentmethod $paymentmethod
     */
    public function setPaymentmethod($paymentmethod)
    {
        $this->paymentmethod = $paymentmethod;
    }

    public function isEqualTo(UserInterface $user)
    {
        return $this->id === $user->getId();
    }


    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}
