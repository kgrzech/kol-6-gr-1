<?php

namespace spec\Kamzor\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class cuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kamzor\Tools\cuboid');
    }
}
