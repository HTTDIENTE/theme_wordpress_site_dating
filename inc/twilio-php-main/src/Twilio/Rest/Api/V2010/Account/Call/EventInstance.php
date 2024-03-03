<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property array $request
 * @property array $response
 */
class EventInstance extends InstanceResource {
	/**
	 * Initialize the EventInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $accountSid The SID of the Account that created this resource
	 * @param string $callSid The unique string that identifies this resource
	 */
	public function __construct( Version $version, array $payload, string $accountSid, string $callSid ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'request'  => Values::array_get( $payload, 'request' ),
			'response' => Values::array_get( $payload, 'response' ),
		];

		$this->solution = [ 'accountSid' => $accountSid, 'callSid' => $callSid, ];
	}

	/**
	 * Magic getter to access properties
	 *
	 * @param string $name Property to access
	 *
	 * @return mixed The requested property
	 * @throws TwilioException For unknown properties
	 */
	public function __get( string $name ) {
		if ( \array_key_exists( $name, $this->properties ) ) {
			return $this->properties[ $name ];
		}

		if ( \property_exists( $this, '_' . $name ) ) {
			$method = 'get' . \ucfirst( $name );

			return $this->$method();
		}

		throw new TwilioException( 'Unknown property: ' . $name );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Api.V2010.EventInstance]';
	}
}
