<?php

namespace NosekAdrian\Tools;

class Cuboid
{
    private $a;
    private $b;
    private $c;

    public function setA($argument1)
    {
        $this->a = $argument1;
        return $this;
    }

    public function getA()
    {
        return $this->a;
    }

    public function setB($argument1)
    {
        $this->b = $argument1;
        return $this;
    }

    public function getB()
    {
        return $this->b;
    }

    public function setC($argument1)
    {
        $this->c = $argument1;
        return $this;
    }

    public function getC()
    {
        return $this->c;
    }

    public function objetoscCuboid()
    {
        return $this->a * $this->b * $this->c;
    }
}
