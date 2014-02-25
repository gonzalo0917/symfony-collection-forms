<?php

namespace Codelty\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * metric
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Codelty\DashboardBundle\Entity\metricRepository")
 */
class metric
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
     * @ORM\Column(name="metric", type="string", length=255)
     */
    private $metric;

    /**
     * @ORM\ManyToOne(targetEntity="metricType", inversedBy="metric")
     * @ORM\JoinColumn(name="metricType_id", referencedColumnName="id")
     */
    private $metricType;


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
     * Set metric
     *
     * @param string $metric
     * @return metric
     */
    public function setMetric($metric)
    {
        $this->metric = $metric;

        return $this;
    }

    /**
     * Get metric
     *
     * @return string 
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * Set metricType
     *
     * @param \Codelty\DashboardBundle\Entity\metricType $metricType
     * @return Client
     */
    public function setMetricType(\Codelty\DashboardBundle\Entity\metricType $metricType = null)
    {
        $this->metricType = $metricType;
    
        return $this;
    }

    /**
     * Get metricType
     *
     * @return \Codelty\DashboardBundle\Entity\metricType 
     */
    public function getMetricType()
    {
        return $this->metricType;
    }
}
