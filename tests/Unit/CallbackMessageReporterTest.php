<?php

namespace Onoi\MessageReporter\Tests\Unit;

use Onoi\MessageReporter\CallbackMessageReporter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Onoi\MessageReporter\CallbackMessageReporter
 * @group onoi-message-reporter
 * @license GNU GPL v2+
 */
class CallbackMessageReporterTest extends TestCase {

	public function testCallbackIsInvoked() {
		$messages = [];

		$reporter = new CallbackMessageReporter(
			function ( $message ) use ( &$messages ) {
				$messages[] = $message;
			}
		);

		$reporter->reportMessage( 'foo' );
		$reporter->reportMessage( 'bar' );

		$this->assertSame(
			[
				'foo',
				'bar'
			],
			$messages
		);
	}

}
