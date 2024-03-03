<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FrontlineApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $identity
 * @property string $friendlyName
 * @property string $avatar
 * @property string $state
 * @property bool $isAvailable
 * @property string $url
 */
class UserInstance extends InstanceResource {
	/**
	 * Initialize the UserInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $sid The SID of the User resource to fetch
	 */
	public function __construct( Version $version, array $payload, string $sid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'          => Values::array_get( $payload, 'sid' ),
			'identity'     => Values::array_get( $payload, 'identity' ),
			'friendlyName' => Values::array_get( $payload, 'friendly_name' ),
			'avatar'       => Values::array_get( $payload, 'avatar' ),
			'state'        => Values::array_get( $payload, 'state' ),
			'isAvailable'  => Values::array_get( $payload, 'is_available' ),
			'url'          => Values::array_get( $payload, 'url' ),
		];

		$this->solution = [ 'sid' => $sid ?: $this->properties['sid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return UserContext Context for this UserInstance
	 */
	protected function proxy(): UserContext {
		if ( ! $this->context ) {
			$this->context = new UserContext( $this->version, $this->solution['sid'] );
		}

		return $this->context;
	}

	/**
	 * Fetch the UserInstance
	 *
	 * @return UserInstance Fetched UserInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): UserInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Update the UserInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return UserInstance Updated UserInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): UserInstance {
		return $this->proxy()->update( $options );
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
		$context = [];
		foreach ( $this->solution as $key => $value ) {
			$context[] = "$key=$value";
		}

		return '[Twilio.FrontlineApi.V1.UserInstance ' . \implode( ' ', $context ) . ']';
	}
}