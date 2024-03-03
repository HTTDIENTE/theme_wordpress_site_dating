<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Routes\V2;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class SipDomainContext extends InstanceContext {
	/**
	 * Initialize the SipDomainContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sipDomain The sip_domain
	 */
	public function __construct( Version $version, $sipDomain ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sipDomain' => $sipDomain, ];

		$this->uri = '/SipDomains/' . \rawurlencode( $sipDomain ) . '';
	}

	/**
	 * Update the SipDomainInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return SipDomainInstance Updated SipDomainInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): SipDomainInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'VoiceRegion'  => $options['voiceRegion'],
			'FriendlyName' => $options['friendlyName'],
		] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new SipDomainInstance( $this->version, $payload, $this->solution['sipDomain'] );
	}

	/**
	 * Fetch the SipDomainInstance
	 *
	 * @return SipDomainInstance Fetched SipDomainInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): SipDomainInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new SipDomainInstance( $this->version, $payload, $this->solution['sipDomain'] );
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

		return '[Twilio.Routes.V2.SipDomainContext ' . \implode( ' ', $context ) . ']';
	}
}
