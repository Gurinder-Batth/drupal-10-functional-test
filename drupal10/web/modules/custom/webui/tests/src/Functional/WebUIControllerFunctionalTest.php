<?php

namespace Drupal\Tests\webui\Functional;

use Drupal\Tests\webui\Functional\WebUIBase;

/**
 * Test something about my WebUI.
 *
 * @group webui
 */

class WebUIControllerFunctionalTest extends WebUIBase {


  protected function setUp() {
    parent::setUp();
  }

  public function testSomething() {
    $this->assertEquals(TRUE, TRUE);
    // $this->markTestSkipped("skip");
  }

  public function testHome() {
    $test =  $this->drupalGet("/web-ui/home");
    dd($test);
  }

}
