<?php

namespace Onoi\MessageReporter\Tests;

use Onoi\MessageReporter\MessageReporterAwareTrait;
use Onoi\MessageReporter\MessageReporterAware;
use Onoi\MessageReporter\MessageReporter;
use Onoi\MessageReporter\NullMessageReporter;

/**
 * @group onoi-message-reporter
 *
 * @license GNU GPL v2+
 * @since 1.3
 *
 * @author mwjames
 */
class MessageReporterAwareTest extends \PHPUnit_Framework_TestCase {

	public function testTrait() {

		$instance = new FooMessageReporterAware();
		$instance->setMessageReporter( new NullMessageReporter() );

		$this->assertInstanceOf(
			NullMessageReporter::class,
			$instance->getMesssageReporter()
		);
	}

}

class FooMessageReporterAware implements MessageReporterAware {

	use MessageReporterAwareTrait;

	public function getMesssageReporter() {
		return $this->messageReporter;
	}

}