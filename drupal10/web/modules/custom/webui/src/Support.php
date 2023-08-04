<?php

namespace Drupal\webui;

use Drupal\node\Entity\Node;

/**
 * Support.
 */
class Support {

    // Check is valid first name.
    function validFirstName($str)  {
      if (strlen($str) < 3) {
        return FALSE;
      }
      else if (strlen($str) > 15) {
        return FALSE;
      }
      else if (strpos($str, "@")) {
        return FALSE;
      }
      else if(str_contains($str, ' ')) {
        return FALSE;
     }
     return TRUE;
    }

    // Check is valid last name.
    function validLastName($str)  {
      if (strlen($str) < 3) {
        return FALSE;
      }
      else if (strlen($str) > 15) {
        return FALSE;
      }
      else if (strpos($str, "@")) {
        return FALSE;
      }
      else if(str_contains($str, ' ')) {
        return FALSE;
     }
     return TRUE;
    }

}