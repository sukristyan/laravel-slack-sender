<?php

namespace Sukristyan\Messaging\Internal;

use Illuminate\Support\Facades\Http;

class Connector
{
  public static function call(string $url, array $data): \Illuminate\Http\Client\Response
  {
    return Http::post($url, $data);
  }
}
