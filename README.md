# Mako helpers

## What is this?

A collection of convenient helper functions meant to be used in your views.

| Function    | Description                                         |
|-------------|-----------------------------------------------------|
| app()       | Returns the `application` instance                  |
| container() | Returns the `mako\syringe\Container` instance       |
| config()    | Returns the `mako\config\Config` instance           |
| request()   | Returns the `mako\http\Request` instance            |
| i18n()      | Returns the `mako\i18n\I18n` instance               |
| humanizer() | Returns the `mako\utility\Humanizer` instance       |
| url()       | Returns the `mako\http\routing\URLBuilder` instance |
| pusher()    | Returne the `mako\pusher\Pusher` instance           |

> The `pusher` function will only work if you have installed the `mako/pusher` package and it also requires you to use the included middleware.

## Installation

	composer require mako/helpers
