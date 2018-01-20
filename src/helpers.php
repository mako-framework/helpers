<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

use mako\application\Application;
use mako\config\Config;
use mako\http\Request;
use mako\i18n\I18n;
use mako\pusher\Pusher;
use mako\syringe\Container;

if(function_exists('app') === false)
{
	/**
	 * Returns the application instance.
	 *
	 * @return \mako\application\Application
	 */
	function app(): Application
	{
		static $app;

		if($app === null)
		{
			$app = Application::instance();
		}

		return $app;
	}
}

if(function_exists('container') === false)
{
	/**
	 * Returns the container instance.
	 *
	 * @return \mako\syringe\Container
	 */
	function container(): Container
	{
		static $container;

		if($container === null)
		{
			$container = Application::instance()->getContainer();
		}

		return $container;
	}
}

if(function_exists('config') === false)
{
	/**
	 * Returns the config instance.
	 *
	 * @return \mako\config\Config
	 */
	function config(): Config
	{
		static $config;

		if($config === null)
		{
			$config = Application::instance()->getConfig();
		}

		return $config;
	}
}

if(function_exists('request') === false)
{
	/**
	 * Returns the request instance.
	 *
	 * @return \mako\http\Request
	 */
	function request(): Request
	{
		static $request;

		if($request === null)
		{
			$request = Application::instance()->getContainer()->get(Request::class);
		}

		return $request;
	}
}

if(function_exists('i18n') === false)
{
	/**
	 * Returns the i18n instance.
	 *
	 * @return \mako\i18n\I18n
	 */
	function i18n(): I18n
	{
		static $i18n;

		if($i18n === null)
		{
			$i18n = Application::instance()->getContainer()->get(I18n::class);
		}

		return $i18n;
	}
}

if(function_exists('pusher') === false)
{
	/**
	 * Returns the pusher instance.
	 *
	 * @return \mako\pusher\Pusher
	 */
	function pusher(): Pusher
	{
		static $pusher;

		if($pusher === null)
		{
			$pusher = Application::instance()->getContainer()->get(Request::class)->getAttribute('mako.pusher');
		}

		return $pusher;
	}
}
