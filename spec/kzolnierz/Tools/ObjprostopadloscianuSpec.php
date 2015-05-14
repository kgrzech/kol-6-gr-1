<?php

namespace spec\kzolnierz\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ObjprostopadloscianuSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('kzolnierz\Tools\Objprostopadloscianu');
    }
    
    function it_should_have_setter_and_gettter()
    {
        $this->setA(5)->getA()->shouldReturn(5);
        $this->setB(4)->getB()->shouldReturn(4);
        $this->setC(3)->getC()->shouldReturn(3);
    }
    
    function it_should_calculate_obj()
    {
    $this->setA(5)->setB(4)->setC(3)->obj()->shouldReturn(60);
    }
}
