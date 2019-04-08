<?php

namespace Onoi\MessageReporter\Tests\Unit;

use Onoi\MessageReporter\SpyMessageReporter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Onoi\MessageReporter\SpyMessageReporter
 * @group onoi-message-reporter
 *
 * @since 1.2
 *
 * @license GNU GPL v2+
 * @author mwjames
 */
class SpyMessageReporterTest extends TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\Onoi\MessageReporter\SpyMessageReporter',
			new SpyMessageReporter()
		);
	}

	public function testSpyOnReportedMessages() {

		$instance = new SpyMessageReporter();
		$instance->reportMessage( 'foo' );

		$this->assertEquals(
			[ 'foo' ],
			$instance->getMessages()
		);

		$instance->reportMessage( 'Bar' );

		$this->assertEquals(
			'foo, Bar',
			$instance->getMessagesAsString()
		);
	}

	public function testClearMessages() {

		$instance = new SpyMessageReporter();
		$instance->reportMessage( 'foo' );

		$this->assertNotEmpty(
			$instance->getMessages()
		);

		$instance->clearMessages();

		$this->assertEmpty(
			$instance->getMessages()
		);
	}

}
