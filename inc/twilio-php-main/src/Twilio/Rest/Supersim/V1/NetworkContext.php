<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Supersim\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class NetworkContext extends InstanceContext {
	/**
	 * Initialize the NetworkContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sid The SID of the Network resource to fetch
	 */
	public function __construct( Version $version, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sid' => $sid, ];

		$this->uri = '/Networks/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the NetworkInstance
	 *
	 * @return NetworkInstance Fetched NetworkInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): NetworkInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new NetworkInstance( $this->version, $payload, $this->solution['sid'] );
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

		return '[Twilio.Supersim.V1.NetworkContext ' . \implode( ' ', $context ) . ']';
	}
}
