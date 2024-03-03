<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Wireless;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $deviceSid
 * @property string $simSid
 * @property string $command
 * @property string $commandMode
 * @property string $status
 * @property string $direction
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class CommandInstance extends InstanceResource {
	/**
	 * Initialize the CommandInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $sid The sid
	 */
	public function __construct( Version $version, array $payload, string $sid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'         => Values::array_get( $payload, 'sid' ),
			'accountSid'  => Values::array_get( $payload, 'account_sid' ),
			'deviceSid'   => Values::array_get( $payload, 'device_sid' ),
			'simSid'      => Values::array_get( $payload, 'sim_sid' ),
			'command'     => Values::array_get( $payload, 'command' ),
			'commandMode' => Values::array_get( $payload, 'command_mode' ),
			'status'      => Values::array_get( $payload, 'status' ),
			'direction'   => Values::array_get( $payload, 'direction' ),
			'dateCreated' => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated' => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
			'url'         => Values::array_get( $payload, 'url' ),
		];

		$this->solution = [ 'sid' => $sid ?: $this->properties['sid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return CommandContext Context for this CommandInstance
	 */
	protected function proxy(): CommandContext {
		if ( ! $this->context ) {
			$this->context = new CommandContext( $this->version, $this->solution['sid'] );
		}

		return $this->context;
	}

	/**
	 * Fetch the CommandInstance
	 *
	 * @return CommandInstance Fetched CommandInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): CommandInstance {
		return $this->proxy()->fetch();
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

		return '[Twilio.Preview.Wireless.CommandInstance ' . \implode( ' ', $context ) . ']';
	}
}
