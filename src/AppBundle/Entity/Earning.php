<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Earning
 *
 * @ORM\Table(name="earning", indexes={@ORM\Index(name="fk_Earning_User1_idx", columns={"HandlerID"}), @ORM\Index(name="fk_Earning_Lib_Currency1_idx", columns={"CurrencyID"})})
 * @ORM\Entity
 */
class Earning
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PaymentDate", type="datetime", nullable=false)
     */
    private $paymentdate;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="EarningID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $earningid;

    /**
     * @var \AppBundle\Entity\LibCurrency
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LibCurrency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CurrencyID", referencedColumnName="CurrencyID")
     * })
     */
    private $currency;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="HandlerID", referencedColumnName="UserID")
     * })
     */
    private $handler;

    /**
     * @return \DateTime
     */
    public function getPaymentdate()
    {
        return $this->paymentdate;
    }

    /**
     * @param \DateTime $paymentdate
     */
    public function setPaymentdate($paymentdate)
    {
        $this->paymentdate = $paymentdate;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getEarningid()
    {
        return $this->earningid;
    }

    /**
     * @param int $earningid
     */
    public function setEarningid($earningid)
    {
        $this->earningid = $earningid;
    }

    /**
     * @return LibCurrency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param LibCurrency $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return User
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param User $handler
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }


}

