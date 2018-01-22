# Mako helpers

## What is this?

A collection of convenient helper functions meant to be used in your views.

| Function                        | Description                                         |
|---------------------------------|-----------------------------------------------------|
| app()                           | Returns the `application` instance                  |
| config()                        | Returns the `mako\config\Config` instance           |
| container()                     | Returns the `mako\syringe\Container` instance       |
| flash($key, $default = null)    | Returns a flash value from the session              |
| gatekeeper($adapterName = null) | Returns a gatekeeper adapter instance               |
| humanizer()                     | Returns the `mako\utility\Humanizer` instance       |
| i18n()                          | Returns the `mako\i18n\I18n` instance               |
| one_time_token()                | Returns a random security token                     |
| pusher()                        | Returns the `mako\pusher\Pusher` instance           |
| request()                       | Returns the `mako\http\Request` instance            |
| session()                       | Returns the `mako\session\Session` instance         |
| token()                         | Returns the session token                           |
| url()                           | Returns the `mako\http\routing\URLBuilder` instance |
| user($adapterName = null)       | Returns the active user or null if there isn't one  |

> The `pusher` function will only work if you have installed the `mako/pusher` package and it also requires you to use the included middleware.

## Installation

	composer require mako/helpers
