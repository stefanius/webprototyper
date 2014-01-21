<?php

namespace Stefanius\WebprototyperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JavascriptLib
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class JavascriptLib
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
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;
   
    /**
     * @var integer
     *
     * @ORM\Column(name="ordering", type="integer")
     */
    private $order;    

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
     * @return JavascriptLib
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
     * Set location
     *
     * @param string $location
     * @return JavascriptLib
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * 
     * @param $order
     */
    public function setOrder($order){
    	$this->order = $order;
    	
    	return $this;
    }
    
    /**
     * @return integer
     */
    public function getOrder(){
    	return $this->order;
    }
    /**
     *
     * @return string
     */
    public function __toString(){
    	return $this->getName();
    }
}
