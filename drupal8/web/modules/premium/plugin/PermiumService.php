<?php
namespace Drupal\premium;

class PremiumService
{

  public function isUserPremium($uid = 0)
  {
    $user = \Drupal\user\Entity\User::load($uid);

    if(!empty($user))
    {
        return $user->hasPermission('view premium content');
    }
    else
     {
        return false;
     }
  }
}
