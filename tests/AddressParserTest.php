<?php
/**
 * @author Yury Kozyrev <ykmship@yandex-team.ru>
 */

namespace Kozz\Tests;

use Kozz\Components\Email\AddressParser;
use PHPUnit_Framework_TestCase;

class AddressParserTest extends PHPUnit_Framework_TestCase
{
  public function testString()
  {
    $emails = 'example0@gmail.com  ,   ,   example1@gmail.com';
    $emails = AddressParser::parse($emails)->toArray();
    $this->assertEquals(['example0@gmail.com','example1@gmail.com'], $emails);

    $emails = 'example0@gmail.com     example1@gmail.com';
    $emails = AddressParser::parse($emails)->toArray();
    $this->assertEquals(['example0@gmail.com','example1@gmail.com'], $emails);
  }

  public function testFilter()
  {
    $emails = 'example0@gmail.com  , kjasdca,nsdca !@$%!@ jds  ,   , , , ';
    $emails = AddressParser::parse($emails)->toArray();
    $this->assertEquals(['example0@gmail.com'], $emails);
  }

  public function testArray()
  {
    $emails = ['example0@gmail.com','example1@gmail.com'];
    $emails = AddressParser::parse($emails)->toArray();
    $this->assertEquals(['example0@gmail.com','example1@gmail.com'], $emails);
  }

  public function testDomainAutoComplete()
  {
    $emails = $emails = 'yk@  ,   ,   mp@, ex@gma.com';
    $emails = AddressParser::parse($emails, 'multiship.ru')->toArray();
    $this->assertEquals(['yk@multiship.ru','mp@multiship.ru', 'ex@gma.com'], $emails);
  }

  public function testDomainAutoCompleteCustom()
  {
    $emails = $emails = 'yk@  ,   ,   mp@, ex@gma.com';
    $emails = AddressParser::parse($emails)->setDomain('gmail.com')->toArray();
    $this->assertEquals(['yk@gmail.com','mp@gmail.com', 'ex@gma.com'], $emails);
  }
}
