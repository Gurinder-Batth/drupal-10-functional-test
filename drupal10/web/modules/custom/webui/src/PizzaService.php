<?php

namespace Drupal\webui;

use Drupal\node\Entity\Node;

/**
 * PizzaService.
 */
class PizzaService {

  
  
  function hasDiscountAvailable(Node $pizza)  {
    $datetime_time = \Drupal::service('datetime.time');
    $current_time = $datetime_time->getCurrentTime();
    $hour = date("H", $current_time);
    if (strtolower($pizza->field_type->value) == "onion") {
      if ($hour >= 12 && $hour < 14) {
        return TRUE;
      }
    }
    return FALSE;
  }

}