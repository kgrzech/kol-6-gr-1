<?php

namespace spec\pawkrzo\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('pawkrzo\Tools\Cuboid');
    }
    function it_should_have_setter_and_gettter()
    {
        $this->setA(3)->getA()->shouldReturn(3);
        $this->setB(3)->getB()->shouldReturn(3);
        $this->setC(2)->getC()->shouldReturn(2);
    }
    function it_should_calculate_objetosc()
	{
	    $this->setA(3)->setB(3)->setC(2)->objetosc()->shouldReturn(18);
	}
}
