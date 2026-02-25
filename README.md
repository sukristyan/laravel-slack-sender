# Laravel Slack Sender

**Laravel Slack Sender** is a simple and flexible package for sending messages to Slack from your Laravel application. It leverages Slack Incoming Webhooks for fast and easy message delivery.

## Features

- 🚀 Easy to use with fluent syntax.
- 🔗 Supports Slack Incoming Webhooks.
- 💬 Send simple text messages.
- 📎 Supports attachments for rich messages.
- 📢 Specify custom channels (if allowed by webhook configuration).

## Requirements

- PHP ^8.2
- Laravel Framework

## Installation

You can install the package via Composer:

```bash
composer require sukristyan/laravel-slack-sender
```

## Usage

Ensure you have a Slack **Incoming Webhook URL**. If you don't have one, you can create it in the [Slack App Management page](https://api.slack.com/messaging/webhooks).

### Basic Usage

Here is an example of how to send a simple message:

```php
use Sukristyan\Messaging\Slack;

$webhookUrl = 'XXXXXXXXXXXXXXXXXXXXXXXX';

Slack::webhook($webhookUrl)
    ->message('Hello! This is a test message from Laravel.')
    ->send();
```

### Sending to a Specific Channel

You can override the default channel configured in the webhook (if allowed):

```php
Slack::webhook($webhookUrl)
    ->channel('#random')
    ->message('This message is sent to the #random channel.')
    ->send();
```

### Sending Messages with Attachments

You can send richer messages using attachments:

```php
Slack::webhook($webhookUrl)
    ->message('Daily Report')
    ->attachments([
        [
            'color' => '#36a64f',
            'title' => 'Server Status',
            'text' => 'All systems are operational.',
            'fields' => [
                [
                    'title' => 'CPU Load',
                    'value' => '15%',
                    'short' => true
                ],
                [
                    'title' => 'Memory Usage',
                    'value' => '320MB',
                    'short' => true
                ]
            ]
        ]
    ])
    ->send();
```

## License

The `sukristyan/laravel-slack-sender` package is open-sourced software licensed under the [MIT LICENSE](LICENSE).
