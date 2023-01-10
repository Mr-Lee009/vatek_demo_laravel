<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_example_2()
    {
        $check = (10 % 2 == 0 ? true : false);
        $this->assertTrue($check);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $check = (10 % 3 == 0 ? true : false);
        $this->assertTrue(!$check);
    }


}
