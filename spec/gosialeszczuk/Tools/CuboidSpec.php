<?php

namespace spec\gosialeszczuk\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('gosialeszczuk\Tools\Cuboid');
    }
    
    function it_should_have_setter_and_gettter()
    {
        $this->setA(456)->getA()->shouldReturn(456);
        $this->setB(852)->getB()->shouldReturn(852);
    }
    
    function it_should_calculate_objetosc()
	{
	    $this->setA(3)->setB(4)->setC(5)->objetosc()->shouldReturn(60);
	}
}
