<?php

namespace Onoi\MessageReporter;

/**
 * @license GNU GPL v2+
 * @since 1.3
 *
 * @author mwjames
 */
trait MessageReporterAwareTrait {

	/**
	 * @var MessageReporter
	 */
	protected $messageReporter;

	/**
	 * @since 1.3
	 *
	 * @param MessageReporter $messageReporter
	 */
	public function setMessageReporter( MessageReporter $messageReporter ) {
		$this->messageReporter = $messageReporter;
	}

}
