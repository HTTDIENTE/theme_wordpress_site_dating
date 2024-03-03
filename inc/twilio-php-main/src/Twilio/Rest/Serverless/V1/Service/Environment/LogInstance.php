<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Serverless\V1\Service\Environment;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $environmentSid
 * @property string $buildSid
 * @property string $deploymentSid
 * @property string $functionSid
 * @property string $requestSid
 * @property string $level
 * @property string $message
 * @property \DateTime $dateCreated
 * @property string $url
 */
class LogInstance extends InstanceResource {
	/**
	 * Initialize the LogInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $serviceSid The SID of the Service that the Log resource is
	 *                           associated with
	 * @param string $environmentSid The SID of the environment in which the log
	 *                               occurred
	 * @param string $sid The SID that identifies the Log resource to fetch
	 */
	public function __construct(
		Version $version,
		array $payload,
		string $serviceSid,
		string $environmentSid,
		string $sid = null
	) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'            => Values::array_get( $payload, 'sid' ),
			'accountSid'     => Values::array_get( $payload, 'account_sid' ),
			'serviceSid'     => Values::array_get( $payload, 'service_sid' ),
			'environmentSid' => Values::array_get( $payload, 'environment_sid' ),
			'buildSid'       => Values::array_get( $payload, 'build_sid' ),
			'deploymentSid'  => Values::array_get( $payload, 'deployment_sid' ),
			'functionSid'    => Values::array_get( $payload, 'function_sid' ),
			'requestSid'     => Values::array_get( $payload, 'request_sid' ),
			'level'          => Values::array_get( $payload, 'level' ),
			'message'        => Values::array_get( $payload, 'message' ),
			'dateCreated'    => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'url'            => Values::array_get( $payload, 'url' ),
		];

		$this->solution = [
			'serviceSid'     => $serviceSid,
			'environmentSid' => $environmentSid,
			'sid'            => $sid ?: $this->properties['sid'],
		];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return LogContext Context for this LogInstance
	 */
	protected function proxy(): LogContext {
		if ( ! $this->context ) {
			$this->context = new LogContext(
				$this->version,
				$this->solution['serviceSid'],
				$this->solution['environmentSid'],
				$this->solution['sid']
			);
		}

		return $this->context;
	}

	/**
	 * Fetch the LogInstance
	 *
	 * @return LogInstance Fetched LogInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): LogInstance {
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

		return '[Twilio.Serverless.V1.LogInstance ' . \implode( ' ', $context ) . ']';
	}
}
