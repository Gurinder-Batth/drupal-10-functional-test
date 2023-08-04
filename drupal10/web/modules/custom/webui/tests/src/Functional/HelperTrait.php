<?php

namespace Drupal\Tests\webui\Functional;

use Drupal\Core\Url;
use Drupal\Core\Session\AccountInterface;


trait HelperTrait {

  public function createUserCustom($roles = []) {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $user = \Drupal\user\Entity\User::create();
    // Mandatory.
    // $pwd = rand(10000, 99999);
    $pwd = 123456;
    $user->setPassword($pwd);
    $user->enforceIsNew();
    $user->setEmail('email'. time().  "@fake.com");
    $user->setUsername('user_name' . time());
    // Optional.
    $user->set('init', 'email');
    $user->set('langcode', $language);
    $user->set('preferred_langcode', $language);
    $user->set('preferred_admin_langcode', $language);
    if ($roles) {
      foreach ($roles as $role) {
        $user->addRole($role);
      }
    }
    $user->activate();
    // Save user account.
    $user->save();
    $user->passRaw = $pwd;
    return $user;
  }


  protected function customDrupalLogin(AccountInterface $account) {
    $session = $this->container->get('session');
    $session->start();
    $session->set('uid', $account->id());
    $session->save();
    $session->set('session_test', TRUE);
  }

  public function login($roles = []) {
    $this->drupalLogin($this->createUserCustom($roles));
  }

}
