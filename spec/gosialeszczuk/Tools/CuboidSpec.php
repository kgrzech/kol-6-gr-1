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
}
