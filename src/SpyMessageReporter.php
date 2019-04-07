<?php

namespace Onoi\MessageReporter;

/**
 * @license GNU GPL v2+
 * @since 1.2
 *
 * @author mwjames
 */
class SpyMessageReporter implements MessageReporter {

	/**
	 * @var array
	 */
	private $messages = [];

	/**
	 * @since 1.2
	 *
	 * {@inheritDoc}
	 */
	public function reportMessage( $message ) {
		$this->messages[] = $message;
	}

	/**
	 * @return array
	 * @since 1.2
	 *
	 */
	public function getMessages() {
		return $this->messages;
	}

	/**
	 * @return string
	 * @since 1.2
	 *
	 */
	public function getMessagesAsString() {
		return implode( ', ', $this->messages );
	}

	/**
	 * @since 1.2
	 */
	public function clearMessages() {
		$this->messages = [];
	}

}
