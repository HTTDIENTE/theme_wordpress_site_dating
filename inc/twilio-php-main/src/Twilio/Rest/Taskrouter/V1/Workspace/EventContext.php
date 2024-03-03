<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class EventContext extends InstanceContext {
	/**
	 * Initialize the EventContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $workspaceSid The SID of the Workspace with the Event to fetch
	 * @param string $sid The SID of the resource to fetch
	 */
	public function __construct( Version $version, $workspaceSid, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'workspaceSid' => $workspaceSid, 'sid' => $sid, ];

		$this->uri = '/Workspaces/' . \rawurlencode( $workspaceSid ) . '/Events/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the EventInstance
	 *
	 * @return EventInstance Fetched EventInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): EventInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new EventInstance(
			$this->version,
			$payload,
			$this->solution['workspaceSid'],
			$this->solution['sid']
		);
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

		return '[Twilio.Taskrouter.V1.EventContext ' . \implode( ' ', $context ) . ']';
	}
}
