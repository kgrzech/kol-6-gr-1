<?php

namespace spec\kustra88\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class cuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('kamzor\Tools\Cuboid');
    }
    function it_should_have_setter_and_gettter()
    {
        $this->setA(1)->getA()->shouldReturn(1);
        $this->setB(2)->getB()->shouldReturn(2);
        $this->setC(3)->getC()->shouldReturn(3);
    }
    function it_should_calculate_objetosc()
	{
	    $this->setA(1)->setB(2)->setC(3)->objetosc()->shouldReturn(6);
	}
}
