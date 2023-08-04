<?php

namespace Drupal\Tests\webui\Functional;

use Drupal\node\Entity\Node;
use Drupal\Component\Datetime\Time;
use Drupal\Tests\webui\Functional\WebUIBase;

/**
 * Test something about my WebUI.
 *
 * @group webui
 */

class PizzaServiceFunctionalTest extends WebUIBase {


  protected function setUp()  : void {
    parent::setUp();
  }

  public function testHasDiscountAvailable() {
    //  Case 1.
    $this->setUpDateService("2023-08-15 12:10:00");
    $pizza_service = \Drupal::service('webui.pizza');
    $node = Node::create([
      'type'        => 'pizza',
      'title'       => 'Pizza',
      'field_type' => "onion",
    ]);
    $node->save();
    $status = $pizza_service->hasDiscountAvailable($node);
    // should be true because pizza type onion and time slot is between 12 to 2.
    $this->assertEquals($status, TRUE);

     //  Case 2.
     $this->setUpDateService("2023-08-15 13:59:00");
     $pizza_service = \Drupal::service('webui.pizza');
     $node = Node::create([
       'type'        => 'pizza',
       'title'       => 'Pizza',
       'field_type' => "onion",
     ]);
     $node->save();
     $status = $pizza_service->hasDiscountAvailable($node);
     // should be true because pizza type onion and time slot is between 12 to 2.
     $this->assertEquals($status, TRUE);

      //  Case 3.
      $this->setUpDateService("2023-08-15 11:59:00");
      $pizza_service = \Drupal::service('webui.pizza');
      $node = Node::create([
        'type'        => 'pizza',
        'title'       => 'Pizza',
        'field_type' => "onion",
      ]);
      $node->save();
      $status = $pizza_service->hasDiscountAvailable($node);
      // should be false because pizza type onion and time slot is between 12 to 2.
      $this->assertEquals($status, FALSE);
  }

  function setUpDateService($timeString) {
    $originalDate = $timeString;
    $strtime = strtotime($originalDate);
    $dateService = $this->getMockBuilder(Time::class)->disableOriginalConstructor()->getMock();
    $dateService->expects($this->any())->method('getCurrentTime')->willReturn($strtime);
    $this->container->set('datetime.time', $dateService);
  }
  

}
