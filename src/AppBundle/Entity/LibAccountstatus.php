<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibAccountstatus
 *
 * @ORM\Table(name="lib_accountstatus")
 * @ORM\Entity
 */
class LibAccountstatus
{
    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="AccountStatusID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accountstatusid;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getAccountstatusid()
    {
        return $this->accountstatusid;
    }

    /**
     * @param int $accountstatusid
     */
    public function setAccountstatusid($accountstatusid)
    {
        $this->accountstatusid = $accountstatusid;
    }


}

