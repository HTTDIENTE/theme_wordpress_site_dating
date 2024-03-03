<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class MessagingConfigurationContext extends InstanceContext {
	/**
	 * Initialize the MessagingConfigurationContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $serviceSid The SID of the Service that the resource is
	 *                           associated with
	 * @param string $country The ISO-3166-1 country code of the country or `all`.
	 */
	public function __construct( Version $version, $serviceSid, $country ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'serviceSid' => $serviceSid, 'country' => $country, ];

		$this->uri = '/Services/' . \rawurlencode( $serviceSid ) . '/MessagingConfigurations/' . \rawurlencode( $country ) . '';
	}

	/**
	 * Update the MessagingConfigurationInstance
	 *
	 * @param string $messagingServiceSid The SID of the Messaging Service used for
	 *                                    this configuration.
	 *
	 * @return MessagingConfigurationInstance Updated MessagingConfigurationInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( string $messagingServiceSid ): MessagingConfigurationInstance {
		$data = Values::of( [ 'MessagingServiceSid' => $messagingServiceSid, ] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new MessagingConfigurationInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['country']
		);
	}

	/**
	 * Fetch the MessagingConfigurationInstance
	 *
	 * @return MessagingConfigurationInstance Fetched MessagingConfigurationInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): MessagingConfigurationInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new MessagingConfigurationInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['country']
		);
	}

	/**
	 * Delete the MessagingConfigurationInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->version->delete( 'DELETE', $this->uri );
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

		return '[Twilio.Verify.V2.MessagingConfigurationContext ' . \implode( ' ', $context ) . ']';
	}
}