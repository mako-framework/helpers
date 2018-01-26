<?php

/**
 * @copyright Frederic G. Østby
 * @license   http://www.makoframework.com/license
 */

namespace mako\helpers\tests;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Helpers tests.
 *
 * @author Frederic G. Østby
 *
 * @runTestsInSeparateProcesses
 */
class HelpersTest extends PHPUnitTestCase
{
	use MockeryPHPUnitIntegration;

	/**
	 *
	 */
	public function testApp()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$this->assertInstanceOf('mako\application\Application', app());

		$this->assertInstanceOf('mako\application\Application', app());
	}

	/**
	 *
	 */
	public function testContainer()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$mock->shouldReceive('getContainer')->once()->andReturn(Mockery::mock('mako\syringe\Container'));

		$this->assertInstanceOf('mako\syringe\Container', container());

		$this->assertInstanceOf('mako\syringe\Container', container());
	}

	/**
	 *
	 */
	public function testConfig()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$mock->shouldReceive('getConfig')->once()->andReturn(Mockery::mock('mako\config\Config'));

		$this->assertInstanceOf('mako\config\Config', config());

		$this->assertInstanceOf('mako\config\Config', config());
	}

	/**
	 *
	 */
	public function testRequest()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$container->shouldReceive('get')->once()->with('mako\http\Request')->andReturn(Mockery::mock('mako\http\Request'));

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertInstanceOf('mako\http\Request', request());

		$this->assertInstanceOf('mako\http\Request', request());
	}

	/**
	 *
	 */
	public function testI18n()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$container->shouldReceive('get')->once()->with('mako\i18n\I18n')->andReturn(Mockery::mock('mako\i18n\I18n'));

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertInstanceOf('mako\i18n\I18n', i18n());

		$this->assertInstanceOf('mako\i18n\I18n', i18n());
	}

	/**
	 *
	 */
	public function testHumanizer()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$container->shouldReceive('get')->once()->with('mako\utility\Humanizer')->andReturn(Mockery::mock('mako\utility\Humanizer'));

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertInstanceOf('mako\utility\Humanizer', humanizer());

		$this->assertInstanceOf('mako\utility\Humanizer', humanizer());
	}

	/**
	 *
	 */
	public function testUrl()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$container->shouldReceive('get')->once()->with('mako\http\routing\URLBuilder')->andReturn(Mockery::mock('mako\http\routing\URLBuilder'));

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertInstanceOf('mako\http\routing\URLBuilder', url());

		$this->assertInstanceOf('mako\http\routing\URLBuilder', url());
	}

	/**
	 *
	 */
	public function testPusher()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$request = Mockery::mock('alias:mako\http\Request');

		$request->shouldReceive('getAttribute')->once()->with('mako.pusher')->andReturn(Mockery::mock('mako\pusher\Pusher'));

		$container->shouldReceive('get')->once()->with('mako\http\Request')->andReturn($request);

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertInstanceOf('mako\pusher\Pusher', pusher());

		$this->assertInstanceOf('mako\pusher\Pusher', pusher());
	}

	/**
	 *
	 */
	public function testSession()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$container->shouldReceive('get')->once()->with('mako\session\Session')->andReturn(Mockery::mock('mako\session\Session'));

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertInstanceOf('mako\session\Session', session());

		$this->assertInstanceOf('mako\session\Session', session());
	}

	/**
	 *
	 */
	public function testFlash()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$session = Mockery::mock('alias:mako\session\Session');

		$session->shouldReceive('getFlash')->times(2)->with('key', null)->andReturn('foobar');

		$container->shouldReceive('get')->once()->with('mako\session\Session')->andReturn($session);

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertSame('foobar', flash('key'));

		$this->assertSame('foobar', flash('key'));
	}

	/**
	 *
	 */
	public function testToken()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$session = Mockery::mock('alias:mako\session\Session');

		$session->shouldReceive('getToken')->times(2)->andReturn('foobar');

		$container->shouldReceive('get')->once()->with('mako\session\Session')->andReturn($session);

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertSame('foobar', token());

		$this->assertSame('foobar', token());
	}

	/**
	 *
	 */
	public function testOneTimeToken()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$session = Mockery::mock('alias:mako\session\Session');

		$session->shouldReceive('generateOneTimeToken')->times(2)->andReturn('foobar');

		$container->shouldReceive('get')->once()->with('mako\session\Session')->andReturn($session);

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertSame('foobar', one_time_token());

		$this->assertSame('foobar', one_time_token());
	}

	/**
	 *
	 */
	public function testGatekeeper()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$authentication = Mockery::mock('alias:mako\gatekeeper\Authentication');

		$authentication->shouldReceive('adapter')->times(2)->with(null)->andReturn(Mockery::mock('mako\gatekeeper\adapters\AdapterInterface'));

		$container->shouldReceive('get')->once()->with('mako\gatekeeper\Authentication')->andReturn($authentication);

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertInstanceOf('mako\gatekeeper\adapters\AdapterInterface', gatekeeper());

		$this->assertInstanceOf('mako\gatekeeper\adapters\AdapterInterface', gatekeeper());
	}

	/**
	 *
	 */
	public function testUser()
	{
		$mock = Mockery::mock('alias:mako\application\Application');

		$mock->shouldReceive('instance')->once()->andReturn($mock);

		$container = Mockery::mock('alias:mako\syringe\Container');

		$authentication = Mockery::mock('alias:mako\gatekeeper\Authentication');

		$adapter = Mockery::mock('alias:mako\gatekeeper\adapters\AdapterInterface');

		$adapter->shouldReceive('getUser')->times(2)->andReturn(null);

		$authentication->shouldReceive('adapter')->times(2)->with(null)->andReturn($adapter);

		$container->shouldReceive('get')->once()->with('mako\gatekeeper\Authentication')->andReturn($authentication);

		$mock->shouldReceive('getContainer')->once()->andReturn($container);

		$this->assertNull(user());

		$this->assertNull(user());
	}
}
