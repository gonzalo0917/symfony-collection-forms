<?php

namespace Codelty\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * threshold
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Codelty\DashboardBundle\Entity\thresholdRepository")
 */
class threshold
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="metric", inversedBy="threshold")
     * @ORM\JoinColumn(name="metric_id", referencedColumnName="id")
     */
    protected $metric;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return threshold
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set metric
     *
     * @param \Codelty\DashboardBundle\Entity\metric $metric
     * @return Client
     */
    public function setMetricType(\Codelty\DashboardBundle\Entity\metric $metric = null)
    {
        $this->metric = $metric;
    
        return $this;
    }

    /**
     * Get metric
     *
     * @return \Codelty\DashboardBundle\Entity\metric 
     */
    public function getMetricType()
    {
        return $this->metric;
    }
}
