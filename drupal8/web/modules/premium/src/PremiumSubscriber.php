<?php
namespace Drupal\premium;

use Drupal\Core\Entity\EntityTypeEvents;
use Symfony\Component\EventDispatcher\event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;


class PremiumSubscriber implements EventSubscriberInterface
{

  static function getSubscribedEvents()
  {
      $events[KernelEvents::REQUEST][] = array('my_function');
      return $events;
  }

  function my_function(Event $event)
  {
      drupal_set_message('kernel event occuredd');
  }
}
