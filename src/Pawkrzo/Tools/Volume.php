<?php

namespace Pawkrzo\Tools;

class Prostopadloscian
{
    private $a;
    private $b;
    private $h;

  public function setA($a)
    {
        $this->a = $a;

        return $this;
        
    }

    public function setB($b)
    {
        $this->b = $b;

        return $this;
    }
    
    public function setH($h)
    {
        $this->h = $h;

        return $this;
    }
   public function getA()
   {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }
    
    public function getH()
    {
        return $this->h;
    }
    function it_should_calculate_volume()
    {
    $this->setA(2)->setB(3)->setH(4)->volume()->shouldReturn(24.0);
    }
    public function pole()
    {
    return $this->a * $this->b * $this->h;
    }
}
