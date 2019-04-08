<?php

namespace Onoi\MessageReporter\Tests\Unit;

use Onoi\MessageReporter\MessageReporterAware;
use Onoi\MessageReporter\MessageReporterAwareTrait;
use Onoi\MessageReporter\NullMessageReporter;
use PHPUnit\Framework\TestCase;

/**
 * @group onoi-message-reporter
 *
 * @license GNU GPL v2+
 * @since 1.3
 *
 * @author mwjames
 */
class MessageReporterAwareTest extends TestCase implements MessageReporterAware {
	use MessageReporterAwareTrait;

	public function testTrait() {

		$this->setMessageReporter( new NullMessageReporter() );

		$this->assertInstanceOf(
			NullMessageReporter::class,
			$this->getMessageReporter()
		);
	}

	public function getMessageReporter() {
		return $this->messageReporter;
	}

}
