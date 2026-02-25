<?php

namespace Sukristyan\Messaging;

use Sukristyan\Messaging\Internal\BaseSlack;

/**
 * @method static self send()
 * @method static self webhook(?string $url)
 * @method static self message(?string $message)
 * @method static self channel(?string $channel)
 * @method static self attachments(?array $attachments)
 *
 * @see \Sukristyan\Messaging\Internal\BaseSlack
 */
final class Slack extends \Illuminate\Support\Facades\Facade
{
  protected static function getFacadeAccessor()
  {
    return BaseSlack::class;
  }
}
