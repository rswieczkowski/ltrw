<?php

namespace App\Iterators;

use Traversable;

class Collection implements \IteratorAggregate
{

    public function __construct(public array $items)
    {
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->items);
    }
}