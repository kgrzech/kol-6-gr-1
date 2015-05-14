<?php

namespace spec\dpyc\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('dpyc\Tools\Cuboid');
    }
    function it_should_have_setter_and_gettter()
    {
        $this->setA(2)->getA()->shouldReturn(2);
        $this->setB(2)->getB()->shouldReturn(2);
        $this->setC(3)->getC()->shouldReturn(3);
    }
    function it_should_calculate_VCuboid()
	{
	    $this->setA(2)->setB(2)->setC(3)->VCuboid()->shouldReturn(12);
	}}
