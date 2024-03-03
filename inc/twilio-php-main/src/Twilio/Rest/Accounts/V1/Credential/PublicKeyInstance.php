<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Accounts\V1\Credential;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $friendlyName
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class PublicKeyInstance extends InstanceResource {
	/**
	 * Initialize the PublicKeyInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $sid The unique string that identifies the resource
	 */
	public function __construct( Version $version, array $payload, string $sid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'          => Values::array_get( $payload, 'sid' ),
			'accountSid'   => Values::array_get( $payload, 'account_sid' ),
			'friendlyName' => Values::array_get( $payload, 'friendly_name' ),
			'dateCreated'  => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'  => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
			'url'          => Values::array_get( $payload, 'url' ),
		];

		$this->solution = [ 'sid' => $sid ?: $this->properties['sid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return PublicKeyContext Context for this PublicKeyInstance
	 */
	protected function proxy(): PublicKeyContext {
		if ( ! $this->context ) {
			$this->context = new PublicKeyContext( $this->version, $this->solution['sid'] );
		}

		return $this->context;
	}

	/**
	 * Fetch the PublicKeyInstance
	 *
	 * @return PublicKeyInstance Fetched PublicKeyInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): PublicKeyInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Update the PublicKeyInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return PublicKeyInstance Updated PublicKeyInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): PublicKeyInstance {
		return $this->proxy()->update( $options );
	}

	/**
	 * Delete the PublicKeyInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->proxy()->delete();
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

		return '[Twilio.Accounts.V1.PublicKeyInstance ' . \implode( ' ', $context ) . ']';
	}
}
