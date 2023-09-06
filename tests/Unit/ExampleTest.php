<?php

use App\Example;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class ExampleTest extends TestCase
{
    /**
     * @covers \Example::execute
     */
    public function testExampleClassShouldReturnTrue()
    {
        $example = new Example(true);

        $this->assertTrue($example->execute());
    }
}
