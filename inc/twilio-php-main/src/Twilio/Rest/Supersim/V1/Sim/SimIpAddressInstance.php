<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Supersim\V1\Sim;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $ipAddress
 * @property string $ipAddressVersion
 */
class SimIpAddressInstance extends InstanceResource {
	/**
	 * Initialize the SimIpAddressInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $simSid The unique string that identifies the resource
	 */
	public function __construct( Version $version, array $payload, string $simSid ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'ipAddress'        => Values::array_get( $payload, 'ip_address' ),
			'ipAddressVersion' => Values::array_get( $payload, 'ip_address_version' ),
		];

		$this->solution = [ 'simSid' => $simSid, ];
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
		return '[Twilio.Supersim.V1.SimIpAddressInstance]';
	}
}
