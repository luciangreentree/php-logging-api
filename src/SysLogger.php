<?php
/**
 * Logs messages/errors into syslog service.
 */
class SysLogger extends Logger {
	private $applicationName;
	
	/**
	 * Creates a logger instance.
	 * @param string $applicationName Name of your application to appear in log lines.
	 */
	public function __construct($applicationName) {
		$this->applicationName = $applicationName;
	}
	
	/**
	 * {@inheritDoc}
	 * @see Logger::log()
	 */
	protected function log($message, $logLevel) {
		openlog($this->applicationName, LOG_NDELAY, LOG_USER);
		syslog($logLevel, $message);
		closelog();
	}
}