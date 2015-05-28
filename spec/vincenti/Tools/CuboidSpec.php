<?php

namespace spec\vincenti\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('vincenti\Tools\Cuboid');
    }
    
     function it_should_have_setter_and_gettter()
    {
        $this->setA(33)->getA()->shouldReturn(33);
        $this->setB(24)->getB()->shouldReturn(24);
        $this->setH(22)->getH()->shouldReturn(22);
    }
    
    function it_should_calculate_sum()
    {
    $this->setA(2)->setB(3)->setH(4)->sum()->shouldReturn(24);
    }
}
