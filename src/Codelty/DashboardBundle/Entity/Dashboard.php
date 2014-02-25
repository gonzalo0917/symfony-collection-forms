<?php

namespace Codelty\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dashboard
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Dashboard
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
     * @ORM\Column(name="Page_title", type="string", length=255)
     */
    private $pageTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="Game_title", type="string", length=255)
     */
    private $gameTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="Platform", type="string", length=255)
     */
    private $platform;    

    /**
     * @ORM\ManyToMany(targetEntity="Codelty\DashboardBundle\Entity\Filters", cascade={"persist"})
     * @ORM\JoinTable(name="dashboard_filters",
     *      joinColumns={@ORM\JoinColumn(name="dashboard_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="filters_id", referencedColumnName="id")}
     *      )
     **/
    private $arrFilters;

    public function __construct()
    {
      $this->arrFilters = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set pageTitle
     *
     * @param string $pageTitle
     * @return Dashboard
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    /**
     * Get pageTitle
     *
     * @return string 
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * Set gameTitle
     *
     * @param string $gameTitle
     * @return Dashboard
     */
    public function setGameTitle($gameTitle)
    {
        $this->gameTitle = $gameTitle;

        return $this;
    }

    /**
     * Get gameTitle
     *
     * @return string 
     */
    public function getGameTitle()
    {
        return $this->gameTitle;
    }

    /**
     * Set platform
     *
     * @param string $platform
     * @return Dashboard
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return string 
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Add arrFilters
     *
     * @param \Codelty\DashboardBundle\Entity\Filters $arrFilters
     * @return Client
     */
    public function addArrFilters(\Codelty\DashboardBundle\Entity\Filters $arrFilters)
    {
        $this->arrFilters[] = $arrFilters;
    
        return $this;
    }

    /**
     * Remove arrFilters
     *
     * @param \Codelty\DashboardBundle\Entity\Filters $arrFilters
     */
    public function removeArrFilters(\Codelty\DashboardBundle\Entity\Filters $arrFilters)
    {
        $this->arrFilters->removeElement($arrFilters);
    }

    /**
     * Get arrFilters
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrFilters()
    {
        return $this->arrFilters;
    }
}
