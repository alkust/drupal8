<?php
namespace Drupal\Premium\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Premium\Plugin\PremiumService;

class PremiumController extends ControllerBase {


  protected $premiumService;

  public function __construct(PremiumService $premiumService)
  {
    $this->premiumService = $premiumService;
  }

public function create (containerInterface $container )
{
  return new static (
    $container->get('premium.premium_service')
  );
}


  /**
   * [isGold description]
   * @return boolean [description]
   */

public function isGold() {
    $message = 'vous ne pouvez pas voir les contenus premuim';
    if(\Drupal::currentUser()->hasPermission('add premium status'))
    {
        $message = 'vous pouvez voir les contenus premium';
    }

    return [
    '#type' => 'markup',
    '#markup' => $message,
    ];
}
public function isUserGold($uid) {
    $message = 'vous ne pouvez pas voir les contenus premuim';
    if(\Drupal\user\Entity\User::load($uid)->hasPermission('view premium content'))
    {
        $message = 'vous pouvez voir les contenus premium';
    }

    return [
    '#type' => 'markup',
    '#markup' => $message,
    ];
}

public function pageGold()
{
    return [
    '#type' => 'markup',
    '#markup' => 'lorem Ipsum....',
    ];
}

}
