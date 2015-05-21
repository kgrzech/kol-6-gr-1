<?php

namespace spec\NosekAdrian\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NosekAdrian\Tools\Cuboid');
    }
    
    function it_should_have_setter_and_gettter()
    {
        $this->setA(123)->getA()->shouldReturn(123);
        $this->setB(234)->getB()->shouldReturn(234);
        $this->setC(345)->getC()->shouldReturn(345);
    }
    
    function it_should_calculate_value()
    {
        $this->setA(2)->setB(3)->setC(4)->objetoscCuboid()->shouldReturn(24);
    }
}
