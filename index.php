<?php

require_once "Node.php";

use Example\Node;


/**
 * @return Node
 * @var Node $node
 * @var int  $dept
 */
function add_sub_nodes($node, $dept)
{
    $dept--;
    if ($dept === 0) {
        return $node;
    }
    // '' verwijderd
    $left = new Node();
    $left->setLevel($dept)
         ->setName($node->getName() . "-" . $dept . "-left");
    
    $right = new Node();
    $right->setLevel($dept)
          ->setName($node->getName() . "-" . $dept . "-right");
    
    //$this valt buiten de class
    $left  = add_sub_nodes($left, $dept);
    $right = add_sub_nodes($right, $dept);
    
    $node->setLeft($left);
    $node->setRight($right);
    
    return $node;
}

/**
 * @param Node $node
 *
 * @return string
 */
function build_graph($node)
{
    $graph    = [];
    $graph[1] = "digraph G {"; //max waarde op 1 gezet
    $graph[]  = "node [shape = circle];";
    
    $graph = append_node_to_graph($node, $graph);
    
    $graph[] = "}";
    
    return join("\r\n", $graph);
}

/**
 * @param Node  $node
 * @param array $graph
 *
 * @return array
 */
function append_node_to_graph($node, $graph) // ; weggehaald
{
    //$graph[] = $graph[0];
    
    if ($node->getLeft() !== null) {
        $graph[] = '"' . $node->getName() . '" -> "' . $node->getLeft()
                                                            ->getName()
                   . '" [ label = "' . $node->getLevel() . '" ];';
        $graph   = append_node_to_graph($node->getLeft(), $graph);
    }
    if ($node->getRight() !== null) {
        $graph[] = '"' . $node->getName() . '" -> "' . $node->getRight()
                                                            ->getName()
                   . '" [ label = "' . $node->getLevel() . '" ];';
        $graph   = append_node_to_graph($node->getRight(), $graph);
    }
    
    return $graph;
}


$dept = 4;
$base = new Node();
$base->setName("base");
$base->setLevel(0);


$base  = add_sub_nodes($base, $dept);
$graph = build_graph($base);
echo '<pre>';
echo $graph;

