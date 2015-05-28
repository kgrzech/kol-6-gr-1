<?php

namespace spec\pjakimiak\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProstopadloscianSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('pjakimiak\Tools\Prostopadloscian');
    }
}
