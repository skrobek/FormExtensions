<?php

namespace Avocode\FormExtensionsBundle\Tests\Model;

/**
 * Dummy object for form type tests
 * 
 * @author Piotr Gołębiewski <loostro@gmail.com>
 */
class TestObject
{
    /**
     * @var integer
     */
    protected $id;
    
    /**
     * @var string
     */
    protected $name;
        
    /**
     * @var collection
     */
    protected $items;
    
    /**
     * Construct object
     */
    public function __construct($id, $name, $items = array())
    {
        $this->id = $id;
        $this->name = $name;
        $this->items = new \Doctrine\Common\Collections\ArrayCollection($items);
    }

    /**
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param TestObject $item
     */
    public function addItem(TestObject $item)
    {
        $this->items[] = $item;
    }

    /**
     * @param TestObject $item
     */
    public function removeItem(TestObject $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }
}
