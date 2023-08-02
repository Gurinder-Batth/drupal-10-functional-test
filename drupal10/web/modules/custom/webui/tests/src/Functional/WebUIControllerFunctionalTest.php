<?php

namespace Drupal\Tests\webui\Functional;

use Drupal\Tests\webui\Functional\WebUIBase;

/**
 * Test something about my WebUI.
 *
 * @group webui
 */

class WebUIControllerFunctionalTest extends WebUIBase {


  protected function setUp()  : void {
    parent::setUp();
  }

  public function testSomething() {
    $this->assertEquals(TRUE, TRUE);
  }

  public function testHome() {

    // Checking pass assertion.
    $type = "pass";
    $response = $this->drupalGet("/web-ui/students/". $type);
    $data = json_decode($response, TRUE);
    foreach ($data['students'] as $student) {
      // assert checking
      $this->assertGreaterThanOrEqual(50, $student['marks']);
    }

    // Checking failed assertion.
    $type = "failed";
    $response = $this->drupalGet("/web-ui/students/". $type);
    $data = json_decode($response, TRUE);
    foreach ($data['students'] as $student) {
      // assert checking
      $this->assertLessThan(50, $student['marks']);
    }

  }

}
