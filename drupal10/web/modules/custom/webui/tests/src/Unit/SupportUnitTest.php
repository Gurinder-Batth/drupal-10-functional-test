<?php

namespace Drupal\Tests\webui\Functional;

/**
 * To be extended by other test classes.
 */

use Drupal\webui\Support;
use Drupal\Tests\UnitTestCase;

class SupportUnitTest extends UnitTestCase {

  private Support $support;

  protected function setUp() : void {
    parent::setUp();
    $this->support = new Support();
  }

  // perform testFirstName.
  public function testFirstName() {
    // Assertion 1
    $valid = $this->support->validFirstName("John");
    $this->assertEquals($valid, TRUE);
    // Assertion 2
    $valid = $this->support->validFirstName("John@Doe");
    $this->assertEquals($valid, FALSE);
    // Assertion 3
    $valid = $this->support->validFirstName("Nico Wright");
    $this->assertEquals($valid, FALSE);
    // Assertion 4
    $valid = $this->support->validFirstName("Amy");
    $this->assertEquals($valid, TRUE);
    // Assertion 5
    $valid = $this->support->validFirstName("XY");
    $this->assertEquals($valid, FALSE);
  }

  public function lastNameProvider()  {
    return [
      [
        "expected" => "Doe",
        "output" => TRUE,
      ],
      [
        "expected" => "Wright Amy",
        "output" => FALSE,
      ],
      [
        "expected" => "Wright@",
        "output" => FALSE,
      ],
      [
        "expected" => "Williams",
        "output" => TRUE,
      ],
    ];
  }

  /**
   * 
   * perform testFirstName.
   *
   * @dataProvider lastNameProvider
   */
  public function testLastName($expected, $output) {
    $valid = $this->support->validFirstName($expected);
    $this->assertEquals($valid, $output);
  }

}
