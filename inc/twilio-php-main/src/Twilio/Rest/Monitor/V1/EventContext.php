<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Monitor\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class EventContext extends InstanceContext {
	/**
	 * Initialize the EventContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sid The SID that identifies the resource to fetch
	 */
	public function __construct( Version $version, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sid' => $sid, ];

		$this->uri = '/Events/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the EventInstance
	 *
	 * @return EventInstance Fetched EventInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): EventInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new EventInstance( $this->version, $payload, $this->solution['sid'] );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		$context = [];
		foreach ( $this->solution as $key => $value ) {
			$context[] = "$key=$value";
		}

		return '[Twilio.Monitor.V1.EventContext ' . \implode( ' ', $context ) . ']';
	}
}
