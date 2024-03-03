<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class BindingContext extends InstanceContext {
	/**
	 * Initialize the BindingContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $chatServiceSid The SID of the Conversation Service that the
	 *                               resource is associated with.
	 * @param string $sid A 34 character string that uniquely identifies this
	 *                    resource.
	 */
	public function __construct( Version $version, $chatServiceSid, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'chatServiceSid' => $chatServiceSid, 'sid' => $sid, ];

		$this->uri = '/Services/' . \rawurlencode( $chatServiceSid ) . '/Bindings/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Delete the BindingInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->version->delete( 'DELETE', $this->uri );
	}

	/**
	 * Fetch the BindingInstance
	 *
	 * @return BindingInstance Fetched BindingInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): BindingInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new BindingInstance(
			$this->version,
			$payload,
			$this->solution['chatServiceSid'],
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

		return '[Twilio.Conversations.V1.BindingContext ' . \implode( ' ', $context ) . ']';
	}
}