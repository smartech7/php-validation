<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Respect\Validation\Rules;

/**
 * @group  rule
 * @covers Respect\Validation\Rules\Finite
 * @covers Respect\Validation\Exceptions\FiniteException
 */
class FiniteTest extends \PHPUnit_Framework_TestCase
{
    protected $rule;

    protected function setUp()
    {
        $this->rule = new Finite();
    }

    /**
     * @dataProvider providerForFinite
     */
    public function testShouldValidateFiniteNumbers($input)
    {
        $this->assertTrue($this->rule->validate($input));
    }

    /**
     * @dataProvider providerForNonFinite
     */
    public function testShouldNotValidateNonFiniteNumbers($input)
    {
        $this->assertFalse($this->rule->validate($input));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\FiniteException
     * @expectedExceptionMessage INF must be a finite number
     */
    public function testShouldThrowFiniteExceptionWhenChecking()
    {
        $this->rule->check(INF);
    }

    public function providerForFinite()
    {
        return array(
            array('123456'),
            array(-9),
            array(0),
            array(16),
            array(2),
            array(PHP_INT_MAX),
        );
    }

    public function providerForNonFinite()
    {
        return array(
            array(' '),
            array(INF),
            array(array()),
            array(new \stdClass()),
            array(null),
        );
    }
}
