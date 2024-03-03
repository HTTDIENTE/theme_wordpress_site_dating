<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Messaging\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class AlphaSenderContext extends InstanceContext {
	/**
	 * Initialize the AlphaSenderContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $serviceSid The SID of the Messaging Service to fetch the
	 *                           resource from
	 * @param string $sid The SID that identifies the resource to fetch
	 */
	public function __construct( Version $version, $serviceSid, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'serviceSid' => $serviceSid, 'sid' => $sid, ];

		$this->uri = '/Services/' . \rawurlencode( $serviceSid ) . '/AlphaSenders/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the AlphaSenderInstance
	 *
	 * @return AlphaSenderInstance Fetched AlphaSenderInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): AlphaSenderInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new AlphaSenderInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['sid']
		);
	}

	/**
	 * Delete the AlphaSenderInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->version->delete( 'DELETE', $this->uri );
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

		return '[Twilio.Messaging.V1.AlphaSenderContext ' . \implode( ' ', $context ) . ']';
	}
}
