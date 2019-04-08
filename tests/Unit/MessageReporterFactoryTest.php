<?php

namespace Onoi\MessageReporter\Tests\Unit;

use Onoi\MessageReporter\MessageReporterFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Onoi\MessageReporter\MessageReporterFactory
 * @group onoi-message-reporter
 *
 * @since 1.0
 *
 * @license GNU GPL v2+
 * @author mwjames
 */
class MessageReporterFactoryTest extends TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\Onoi\MessageReporter\MessageReporterFactory',
			new MessageReporterFactory()
		);

		$this->assertInstanceOf(
			'\Onoi\MessageReporter\MessageReporterFactory',
			MessageReporterFactory::getInstance()
		);
	}

	public function testClear() {

		$instance = MessageReporterFactory::getInstance();

		$this->assertSame(
			$instance,
			MessageReporterFactory::getInstance()
		);

		$instance->clear();

		$this->assertNotSame(
			$instance,
			MessageReporterFactory::getInstance()
		);
	}

	public function testCanConstructNullMessageReporter() {

		$instance = new MessageReporterFactory();

		$this->assertInstanceOf(
			'\Onoi\MessageReporter\NullMessageReporter',
			$instance->newNullMessageReporter()
		);
	}

	public function testCanConstructObservableMessageReporter() {

		$instance = new MessageReporterFactory();

		$this->assertInstanceOf(
			'\Onoi\MessageReporter\ObservableMessageReporter',
			$instance->newObservableMessageReporter()
		);
	}

	public function testCanConstructSpyMessageReporter() {

		$instance = new MessageReporterFactory();

		$this->assertInstanceOf(
			'\Onoi\MessageReporter\SpyMessageReporter',
			$instance->newSpyMessageReporter()
		);
	}

}
