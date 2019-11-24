<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibCurrency
 *
 * @ORM\Table(name="lib_currency")
 * @ORM\Entity
 */
class LibCurrency
{
    /**
     * @var string
     *
     * @ORM\Column(name="Currency", type="string", length=5, nullable=false)
     */
    private $currency;

    /**
     * @var integer
     *
     * @ORM\Column(name="CurrencyID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $currencyid;

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getCurrencyid()
    {
        return $this->currencyid;
    }

    /**
     * @param int $currencyid
     */
    public function setCurrencyid($currencyid)
    {
        $this->currencyid = $currencyid;
    }


}

