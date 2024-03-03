<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $friendlyName
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 */
class KeyInstance extends InstanceResource {
	/**
	 * Initialize the KeyInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $accountSid A 34 character string that uniquely identifies
	 *                           this resource.
	 * @param string $sid The unique string that identifies the resource
	 */
	public function __construct( Version $version, array $payload, string $accountSid, string $sid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'          => Values::array_get( $payload, 'sid' ),
			'friendlyName' => Values::array_get( $payload, 'friendly_name' ),
			'dateCreated'  => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'  => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
		];

		$this->solution = [ 'accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return KeyContext Context for this KeyInstance
	 */
	protected function proxy(): KeyContext {
		if ( ! $this->context ) {
			$this->context = new KeyContext(
				$this->version,
				$this->solution['accountSid'],
				$this->solution['sid']
			);
		}

		return $this->context;
	}

	/**
	 * Fetch the KeyInstance
	 *
	 * @return KeyInstance Fetched KeyInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): KeyInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Update the KeyInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return KeyInstance Updated KeyInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): KeyInstance {
		return $this->proxy()->update( $options );
	}

	/**
	 * Delete the KeyInstance
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

		return '[Twilio.Api.V2010.KeyInstance ' . \implode( ' ', $context ) . ']';
	}
}
