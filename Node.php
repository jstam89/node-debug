<?php

namespace Example;

class Node
{
    /** @var string */
    private $name;
    
    /** @var int */
    private $level;
    
    /** @var Node $left */
    private $left;
    
    /** @var Node $right */
    private $right;
    
    
    /**
     * Node constructor.
     */
    public function __construct()
    {
    }
    
    /**
     * @return Node
     */
    public function getLeft()
    {
        return $this->left;
    }
    
    /**
     * @param Node $left
     *
     * @return Node
     */
    public function setLeft($left)
    {
        $this->left = $left;
        
        return $this;
    }
    
    /**
     * @return Node
     */
    public function getRight()
    {
        return $this->right;
    }
    
    /**
     * @param Node $right
     *
     * @return Node
     */
    public function setRight($right)
    {
        $this->right = $right;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }
    
    /**
     * @param int $level
     *
     * @return Node
     */
    public function setLevel($level)
    {
        $this->level = $level;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     *
     * @return Node
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
}