<?php

namespace Onoi\MessageReporter\Tests\Unit;

use Onoi\MessageReporter\MessageReporter;
use PHPUnit\Framework\TestCase;

/**
 * @group onoi-message-reporter
 *
 * @license GNU GPL v2+
 */
abstract class MessageReporterTestCase extends TestCase {

	/**
	 * Message provider, includes edge cases and random tests
	 *
	 * @return array
	 */
	public function reportMessageProvider() {
		$messages = [];

		$messages[] = '';
		$messages[] = '  ';

		foreach ( array_merge( range( 1, 100 ), [ 1000, 10000 ] ) as $length ) {
			$string = [];

			for ( $position = 0; $position < $length; $position++ ) {
				$string[] = chr( mt_rand( 32, 126 ) );
			}

			$messages[] = implode( '', $string );
		}

		return $this->arrayWrap( $messages );
	}

	protected function arrayWrap( array $elements ) {
		return array_map(
			function ( $element ) {
				return [ $element ];
			},
			$elements
		);
	}

	/**
	 * @dataProvider reportMessageProvider
	 *
	 * @param string $message
	 */
	public function testReportMessage( $message ) {
		foreach ( $this->getInstances() as $reporter ) {
			$reporter->reportMessage( $message );
			$reporter->reportMessage( $message );
			$this->assertTrue( true );
		}
	}

	/**
	 * @return MessageReporter[]
	 */
	public abstract function getInstances();

}
