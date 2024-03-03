<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service\Entity;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class FactorContext extends InstanceContext {
	/**
	 * Initialize the FactorContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $serviceSid Service Sid.
	 * @param string $identity Unique external identifier of the Entity
	 * @param string $sid A string that uniquely identifies this Factor.
	 */
	public function __construct( Version $version, $serviceSid, $identity, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'serviceSid' => $serviceSid, 'identity' => $identity, 'sid' => $sid, ];

		$this->uri = '/Services/' . \rawurlencode( $serviceSid ) . '/Entities/' . \rawurlencode( $identity ) . '/Factors/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Delete the FactorInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->version->delete( 'DELETE', $this->uri );
	}

	/**
	 * Fetch the FactorInstance
	 *
	 * @return FactorInstance Fetched FactorInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): FactorInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new FactorInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['identity'],
			$this->solution['sid']
		);
	}

	/**
	 * Update the FactorInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return FactorInstance Updated FactorInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): FactorInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'AuthPayload'                 => $options['authPayload'],
			'FriendlyName'                => $options['friendlyName'],
			'Config.NotificationToken'    => $options['configNotificationToken'],
			'Config.SdkVersion'           => $options['configSdkVersion'],
			'Config.TimeStep'             => $options['configTimeStep'],
			'Config.Skew'                 => $options['configSkew'],
			'Config.CodeLength'           => $options['configCodeLength'],
			'Config.Alg'                  => $options['configAlg'],
			'Config.NotificationPlatform' => $options['configNotificationPlatform'],
		] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new FactorInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['identity'],
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

		return '[Twilio.Verify.V2.FactorContext ' . \implode( ' ', $context ) . ']';
	}
}