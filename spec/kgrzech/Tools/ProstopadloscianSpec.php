<?php

namespace spec\kgrzech\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProstopadloscianSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('kgrzech\Tools\Prostopadloscian');
    }
    function it_should_have_setter_and_gettter()
    {
        $this->setA(2)->getA()->shouldReturn(2);
        $this->setB(2)->getB()->shouldReturn(2);
        $this->setC(2)->getC()->shouldReturn(2);
    }
    function it_should_calculate_objetosc()
	{
	    $this->setA(2)->setB(2)->setC(2)->objetosc()->shouldReturn(8);
	}
}
