<?php

namespace spec\verenichvlad\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('verenichvlad\Tools\Cuboid');
    }
    function it_should_have_setter_and_gettter()
    {
        $this->setA(2)->getA()->shouldReturn(2);
        $this->setB(2)->getB()->shouldReturn(2);
        $this->setC(4)->getC()->shouldReturn(4);
    }
    function it_should_calculate_objetosc()
	{
	    $this->setA(2)->setB(2)->setC(4)->objetosc()->shouldReturn(16);
	}
}
