<?php

namespace Sukristyan\Messaging\Internal;

use Sukristyan\Messaging\Exception\SlackErrorException;

class BaseSlack
{
  /**
   * @var ?string
   */
  public ?string $channel = null;

  /**
   * @var ?string
   */
  public ?string $url = null;

  /**
   * @var ?string
   */
  public ?string $message = null;

  /**
   * @var ?array
   */
  public ?array $attachments = [];

  /**
   * @param ?string $channel
   * @return self
   */
  public function channel(?string $channel): self
  {
    $this->channel = $channel;
    return $this;
  }

  /**
   * @param ?string $url
   * @return self
   */
  public function webhook(?string $url): self
  {
    $this->url = $url;
    return $this;
  }

  /**
   * @param ?string $message
   * @return self
   */
  public function message(?string $message): self
  {
    $this->message = $message;
    return $this;
  }

  /**
   * @param ?array $attachments
   * @return self
   */
  public function attachments(?array $attachments): self
  {
    $this->attachments = $attachments;
    return $this;
  }

  /**
   * Send message to Slack
   * @return \Illuminate\Http\Client\Response
   */
  public function send(): \Illuminate\Http\Client\Response
  {
    throw_if(empty($this->url), new SlackErrorException('Webhook URL is required'));
    throw_if(
      empty($this->message) && empty($this->attachments),
      new SlackErrorException('Either message or attachments is required')
    );
    return Connector::call($this->url, $this->build());
  }

  /**
   * Build required payload
   * @return array
   */
  protected function build(): array
  {
    return array_filter([
      'channel' => $this->channel,
      'text' => $this->message,
      'attachments' => $this->attachments,
    ]);
  }
}
