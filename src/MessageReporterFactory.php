<?php

namespace Onoi\MessageReporter;

/**
 * @license GNU GPL v2+
 * @since 1.0
 *
 * @author mwjames
 */
class MessageReporterFactory {

	/**
	 * @var MessageReporterFactory
	 */
	private static $instance = null;

	/**
	 * @return MessageReporterFactory
	 * @since 1.0
	 */
	public static function getInstance() {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * @since 1.0
	 */
	public static function clear() {
		self::$instance = null;
	}

	/**
	 * @return NullMessageReporter
	 * @since 1.0
	 */
	public function newNullMessageReporter() {
		return new NullMessageReporter();
	}

	/**
	 * @return ObservableMessageReporter
	 * @since 1.0
	 */
	public function newObservableMessageReporter() {
		return new ObservableMessageReporter();
	}

	/**
	 * @return SpyMessageReporter
	 * @since 1.2
	 */
	public function newSpyMessageReporter() {
		return new SpyMessageReporter();
	}

}
