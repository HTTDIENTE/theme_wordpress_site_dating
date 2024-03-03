<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\DeployedDevices;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Rest\Preview\DeployedDevices\Fleet\CertificateList;
use Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentList;
use Twilio\Rest\Preview\DeployedDevices\Fleet\DeviceList;
use Twilio\Rest\Preview\DeployedDevices\Fleet\KeyList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $url
 * @property string $uniqueName
 * @property string $friendlyName
 * @property string $accountSid
 * @property string $defaultDeploymentSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property array $links
 */
class FleetInstance extends InstanceResource {
	protected $_devices;
	protected $_deployments;
	protected $_certificates;
	protected $_keys;

	/**
	 * Initialize the FleetInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $sid A string that uniquely identifies the Fleet.
	 */
	public function __construct( Version $version, array $payload, string $sid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'                  => Values::array_get( $payload, 'sid' ),
			'url'                  => Values::array_get( $payload, 'url' ),
			'uniqueName'           => Values::array_get( $payload, 'unique_name' ),
			'friendlyName'         => Values::array_get( $payload, 'friendly_name' ),
			'accountSid'           => Values::array_get( $payload, 'account_sid' ),
			'defaultDeploymentSid' => Values::array_get( $payload, 'default_deployment_sid' ),
			'dateCreated'          => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'          => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
			'links'                => Values::array_get( $payload, 'links' ),
		];

		$this->solution = [ 'sid' => $sid ?: $this->properties['sid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return FleetContext Context for this FleetInstance
	 */
	protected function proxy(): FleetContext {
		if ( ! $this->context ) {
			$this->context = new FleetContext( $this->version, $this->solution['sid'] );
		}

		return $this->context;
	}

	/**
	 * Fetch the FleetInstance
	 *
	 * @return FleetInstance Fetched FleetInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): FleetInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Delete the FleetInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->proxy()->delete();
	}

	/**
	 * Update the FleetInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return FleetInstance Updated FleetInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): FleetInstance {
		return $this->proxy()->update( $options );
	}

	/**
	 * Access the devices
	 */
	protected function getDevices(): DeviceList {
		return $this->proxy()->devices;
	}

	/**
	 * Access the deployments
	 */
	protected function getDeployments(): DeploymentList {
		return $this->proxy()->deployments;
	}

	/**
	 * Access the certificates
	 */
	protected function getCertificates(): CertificateList {
		return $this->proxy()->certificates;
	}

	/**
	 * Access the keys
	 */
	protected function getKeys(): KeyList {
		return $this->proxy()->keys;
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

		return '[Twilio.Preview.DeployedDevices.FleetInstance ' . \implode( ' ', $context ) . ']';
	}
}
