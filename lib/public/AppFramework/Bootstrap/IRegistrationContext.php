<?php

declare(strict_types=1);

/**
 * @copyright 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCP\AppFramework\Bootstrap;

use OCP\AppFramework\IAppContainer;
use OCP\EventDispatcher\IEventDispatcher;
use OCP\IContainer;

/**
 * The context object passed to IBootstrap::register
 *
 * @since 20.0.0
 * @see IBootstrap::register()
 */
interface IRegistrationContext {

	/**
	 * @param string $capability
	 * @see IAppContainer::registerCapability
	 *
	 * @since 20.0.0
	 */
	public function registerCapability(string $capability): void;

	/**
	 * Register a service
	 *
	 * @param string $name
	 * @param callable $factory
	 * @param bool $shared
	 *
	 * @return void
	 * @see IContainer::registerService()
	 *
	 * @since 20.0.0
	 */
	public function registerService(string $name, callable $factory, bool $shared = true): void;

	/**
	 * @param string $alias
	 * @param string $target
	 *
	 * @return void
	 * @see IContainer::registerAlias()
	 *
	 * @since 20.0.0
	 */
	public function registerServiceAlias(string $alias, string $target): void;

	/**
	 * @param string $name
	 * @param mixed $value
	 *
	 * @return void
	 * @see IContainer::registerParameter()
	 *
	 * @since 20.0.0
	 */
	public function registerParameter(string $name, $value): void;

	/**
	 * Register a service listener
	 *
	 * This is equivalent to calling IEventDispatcher::addServiceListener
	 *
	 * @param string $event preferably the fully-qualified class name of the Event sub class to listen for
	 * @param string $listener fully qualified class name (or ::class notation) of a \OCP\EventDispatcher\IEventListener that can be built by the DI container
	 * @param int $priority
	 *
	 * @see IEventDispatcher::addServiceListener()
	 *
	 * @since 20.0.0
	 */
	public function registerEventListener(string $event, string $listener, int $priority = 0): void;

	/**
	 * @param string $class
	 *
	 * @return void
	 * @see IAppContainer::registerMiddleWare()
	 *
	 * @since 20.0.0
	 */
	public function registerMiddleware(string $class): void;
}
