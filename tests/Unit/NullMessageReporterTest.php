<?php

namespace Onoi\MessageReporter\Tests\Unit;

use Onoi\MessageReporter\NullMessageReporter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Onoi\MessageReporter\NullMessageReporter
 * @group onoi-message-reporter
 *
 * @since 1.0
 *
 * @license GNU GPL v2+
 * @author mwjames
 */
class NullMessageReporterTest extends TestCase {

	public function testCanConstruct() {

		$this->assertInstanceOf(
			'\Onoi\MessageReporter\NullMessageReporter',
			new NullMessageReporter()
		);
	}

	public function testReportMessage() {

		$instance = new NullMessageReporter();

		$this->assertNull(
			$instance->reportMessage( 'foo' )
		);
	}

}
