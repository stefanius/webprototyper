<?php

namespace Stefanius\WebprototyperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Page
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
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="pagetitle", type="string", length=255)
     */
    private $pagetitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="Javascript")
     * @ORM\JoinTable(name="pages_javascripts",
     *      joinColumns={@ORM\JoinColumn(name="page_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="javascript_id", referencedColumnName="id")}
     * )
     */
    private $javascripts;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="CssLib")
     * @ORM\JoinTable(name="pages_csslibs",
     *      joinColumns={@ORM\JoinColumn(name="page_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="csslib_id", referencedColumnName="id")}
     * )
     */
    private $cssLibs;
        
    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="JavascriptLib")
     * @ORM\JoinTable(name="pages_javascriptlibs",
     *      joinColumns={@ORM\JoinColumn(name="page_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="javascriptlib_id", referencedColumnName="id")}
     * )
     * @ORM\OrderBy({"order"="ASC"})
     */
    private $javascriptLibs;
    
    public function __construct(){
    	$this->javascripts = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->cssLibs = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->javascriptLibs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set body
     *
     * @param string $body
     * @return Page
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set pagetitle
     *
     * @param string $pagetitle
     * @return Page
     */
    public function setPagetitle($pagetitle)
    {
        $this->pagetitle = $pagetitle;

        return $this;
    }

    /**
     * Get pagetitle
     *
     * @return string 
     */
    public function getPagetitle()
    {
        return $this->pagetitle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Page
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Page
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set javascripts
     *
     * @param array $javascripts
     * @return Page
     */
    public function setJavascripts($javascripts)
    {
        $this->javascripts = $javascripts;

        return $this;
    }

    /**
     * Get javascripts
     *
     * @return array 
     */
    public function getJavascripts()
    {
        return $this->javascripts;
    }

    /**
     * 
     * @param unknown_type $cssLibs
     * @return \Stefanius\WebprototyperBundle\Entity\Page
     */
    public function setCssLibs($cssLibs)
    {
    	$this->cssLibs = $cssLibs;
    
    	return $this;
    }
    
    /**
     * 
     */
    public function getCssLibs()
    {
    	return $this->cssLibs;
    }   

    /**
     *
     * @param unknown_type $cssLibs
     * @return \Stefanius\WebprototyperBundle\Entity\Page
     */
    public function setJavascriptLibs($javascriptLibs)
    {
    	$this->javascriptLibs = $javascriptLibs;
    
    	return $this;
    }
      
    /**
     *
     */
    public function getJavascriptLibs()
    {
    	return $this->javascriptLibs;
    }
    
}
