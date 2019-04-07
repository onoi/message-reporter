<?php

namespace Onoi\MessageReporter;

/**
 * Message reporter that reports messages by passing them along to all
 * registered handlers.
 *
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ObservableMessageReporter implements MessageReporter {

	/**
	 * @since 1.0
	 *
	 * @var MessageReporter[]
	 */
	protected $reporters = [];

	/**
	 * @since 1.0
	 *
	 * @var callable[]
	 */
	protected $callbacks = [];

	/**
	 * @param string $message
	 *
	 * @since 1.0
	 *
	 * @see MessageReporter::report
	 */
	public function reportMessage( $message ) {
		foreach ( $this->reporters as $reporter ) {
			$reporter->reportMessage( $message );
		}

		foreach ( $this->callbacks as $callback ) {
			call_user_func( $callback, $message );
		}
	}

	/**
	 * Register a new message reporter.
	 *
	 * @param MessageReporter $reporter
	 *
	 * @since 1.0
	 */
	public function registerMessageReporter( MessageReporter $reporter ) {
		$this->reporters[] = $reporter;
	}

	/**
	 * Register a callback as message reporter.
	 *
	 * @param callable $handler |null
	 *
	 * @since 1.0
	 */
	public function registerReporterCallback( $handler = null ) {
		if ( is_callable( $handler ) ) {
			$this->callbacks[] = $handler;
		}
	}

}
