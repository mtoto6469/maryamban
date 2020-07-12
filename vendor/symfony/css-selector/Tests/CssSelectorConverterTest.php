<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\CssSelector\CssSelectorConverter;

class CssSelectorConverterTest extends TestCase
{
    public function testCssToXPath()
    {
        $converter = new CssSelectorConverter();

        $this->assertEquals('descendant-or-self::*', $converter->toXPath(''));
        $this->assertEquals('descendant-or-self::h3', $converter->toXPath('h3'));
        $this->assertEquals("descendant-or-self::h3[@id = 'foo']", $converter->toXPath('h3#foo'));
        $this->assertEquals("descendant-or-self::h3[@class and contains(concat(' ', normalize-space(@class), ' '), ' foo ')]", $converter->toXPath('h3.foo'));
        $this->assertEquals('descendant-or-self::foo:h3', $converter->toXPath('foo|h3'));
        $this->assertEquals('descendant-or-self::h3', $converter->toXPath('h3'));
    }

    public function testCssToXPathXml()
    {
        $converter = new CssSelectorConverter(false);

        $this->assertEquals('descendant-or-self::h3', $converter->toXPath('h3'));
    }

    /**
     * @expectedException \Symfony\Component\CssSelector\Exception\ParseException
     * @expectedExceptionMessage Expected identifier, but <eof at 3> found.
     */
    public function testParseExceptions()
    {
        $converter = new CssSelectorConverter();
        $converter->toXPath('h3:');
    }

    /** @dataProvider getCssToXPathWithoutPrefixTestData */
    public function testCssToXPathWithoutPrefix($css, $xpath)
    {
        $converter = new CssSelectorConverter();

        $this->assertEquals($xpath, $converter->toXPath($css, ''), '->parse() parses an input string and returns a node');
    }

    public function getCssToXPathWithoutPrefixTestData()
    {
        return array(
            array('h3', 'h3'),
            array('foo|h3', 'foo:h3'),
            array('h3, h2, h3', 'h3 | h2 | h3'),
            array('h3:nth-child(3n+1)', "*/*[name() = 'h3' and (position() - 1 >= 0 and (position() - 1) mod 3 = 0)]"),
            array('h3 > p', 'h3/p'),
            array('h3#foo', "h3[@id = 'foo']"),
            array('h3.foo', "h3[@class and contains(concat(' ', normalize-space(@class), ' '), ' foo ')]"),
            array('h3[class*="foo bar"]', "h3[@class and contains(@class, 'foo bar')]"),
            array('h3[foo|class*="foo bar"]', "h3[@foo:class and contains(@foo:class, 'foo bar')]"),
            array('h3[class]', 'h3[@class]'),
            array('h3 .foo', "h3/descendant-or-self::*/*[@class and contains(concat(' ', normalize-space(@class), ' '), ' foo ')]"),
            array('h3 #foo', "h3/descendant-or-self::*/*[@id = 'foo']"),
            array('h3 [class*=foo]', "h3/descendant-or-self::*/*[@class and contains(@class, 'foo')]"),
            array('div>.foo', "div/*[@class and contains(concat(' ', normalize-space(@class), ' '), ' foo ')]"),
            array('div > .foo', "div/*[@class and contains(concat(' ', normalize-space(@class), ' '), ' foo ')]"),
        );
    }
}
