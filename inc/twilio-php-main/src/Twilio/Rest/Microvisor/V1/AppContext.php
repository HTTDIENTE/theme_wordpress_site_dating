<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Microvisor\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AppContext extends InstanceContext {
	/**
	 * Initialize the AppContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sid A string that uniquely identifies this App.
	 */
	public function __construct( Version $version, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sid' => $sid, ];

		$this->uri = '/Apps/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the AppInstance
	 *
	 * @return AppInstance Fetched AppInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): AppInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new AppInstance( $this->version, $payload, $this->solution['sid'] );
	}

	/**
	 * Delete the AppInstance
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

		return '[Twilio.Microvisor.V1.AppContext ' . \implode( ' ', $context ) . ']';
	}
}
