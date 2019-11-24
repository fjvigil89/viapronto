<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibPaymentmethod
 *
 * @ORM\Table(name="lib_paymentmethod")
 * @ORM\Entity
 */
class LibPaymentmethod
{
    /**
     * @var string
     *
     * @ORM\Column(name="PaymentMethod", type="string", length=25, nullable=false)
     */
    private $paymentmethod;

    /**
     * @var integer
     *
     * @ORM\Column(name="PaymentMethodID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paymentmethodid;

    /**
     * @return string
     */
    public function getPaymentmethod()
    {
        return $this->paymentmethod;
    }

    /**
     * @param string $paymentmethod
     */
    public function setPaymentmethod($paymentmethod)
    {
        $this->paymentmethod = $paymentmethod;
    }

    /**
     * @return int
     */
    public function getPaymentmethodid()
    {
        return $this->paymentmethodid;
    }

    /**
     * @param int $paymentmethodid
     */
    public function setPaymentmethodid($paymentmethodid)
    {
        $this->paymentmethodid = $paymentmethodid;
    }




}

