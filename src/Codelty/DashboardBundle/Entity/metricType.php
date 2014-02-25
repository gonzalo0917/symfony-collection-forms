<?php

namespace Codelty\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * metricType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Codelty\DashboardBundle\Entity\metricTypeRepository")
 */
class metricType
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
     * @ORM\Column(name="metricType", type="string", length=255)
     */
    private $metricType;

     /**
     * @ORM\OneToMany(targetEntity="metric", mappedBy="metricType")
     */
    protected $metric;


    public function __construct()
    {
        $this->metric = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set metricType
     *
     * @param string $metricType
     * @return metricType
     */
    public function setMetricType($metricType)
    {
        $this->metricType = $metricType;

        return $this;
    }

    /**
     * Get metricType
     *
     * @return string 
     */
    public function getMetricType()
    {
        return $this->metricType;
    }

    /**
     * Get metricType
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->metricType;
    }

    /**
     * Add metric
     *
     * @param \Codelty\DashboardBundle\Entity\metric $metric
     * @return Client
     */
    public function addArrFilters(\Codelty\DashboardBundle\Entity\metric $metric)
    {
        $this->metric[] = $metric;
    
        return $this;
    }

    /**
     * Remove metric
     *
     * @param \Codelty\DashboardBundle\Entity\metric $metric
     */
    public function removeArrFilters(\Codelty\DashboardBundle\Entity\metric $metric)
    {
        $this->metric->removeElement($metric);
    }

    /**
     * Get metric
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrFilters()
    {
        return $this->metric;
    }
}
