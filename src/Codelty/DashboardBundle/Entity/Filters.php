<?php

namespace Codelty\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filters
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Filters
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
     * @ORM\Column(name="Filter", type="string", length=255)
     */
    private $filter;


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
     * Set filter
     *
     * @param string $filter
     * @return Filters
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return string 
     */
    public function getFilter()
    {
        return $this->filter;
    }

}
