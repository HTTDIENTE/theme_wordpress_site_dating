<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\HostedNumbers;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class HostedNumberOrderContext extends InstanceContext {
	/**
	 * Initialize the HostedNumberOrderContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sid HostedNumberOrder sid.
	 */
	public function __construct( Version $version, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sid' => $sid, ];

		$this->uri = '/HostedNumberOrders/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the HostedNumberOrderInstance
	 *
	 * @return HostedNumberOrderInstance Fetched HostedNumberOrderInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): HostedNumberOrderInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new HostedNumberOrderInstance( $this->version, $payload, $this->solution['sid'] );
	}

	/**
	 * Delete the HostedNumberOrderInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->version->delete( 'DELETE', $this->uri );
	}

	/**
	 * Update the HostedNumberOrderInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return HostedNumberOrderInstance Updated HostedNumberOrderInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): HostedNumberOrderInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'FriendlyName'            => $options['friendlyName'],
			'UniqueName'              => $options['uniqueName'],
			'Email'                   => $options['email'],
			'CcEmails'                => Serialize::map( $options['ccEmails'], function ( $e ) {
				return $e;
			} ),
			'Status'                  => $options['status'],
			'VerificationCode'        => $options['verificationCode'],
			'VerificationType'        => $options['verificationType'],
			'VerificationDocumentSid' => $options['verificationDocumentSid'],
			'Extension'               => $options['extension'],
			'CallDelay'               => $options['callDelay'],
		] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new HostedNumberOrderInstance( $this->version, $payload, $this->solution['sid'] );
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

		return '[Twilio.Preview.HostedNumbers.HostedNumberOrderContext ' . \implode( ' ', $context ) . ']';
	}
}
