<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class NewSigningKeyList extends ListResource {
	/**
	 * Construct the NewSigningKeyList
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $accountSid A 34 character string that uniquely identifies
	 *                           this resource.
	 */
	public function __construct( Version $version, string $accountSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'accountSid' => $accountSid, ];

		$this->uri = '/Accounts/' . \rawurlencode( $accountSid ) . '/SigningKeys.json';
	}

	/**
	 * Create the NewSigningKeyInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return NewSigningKeyInstance Created NewSigningKeyInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function create( array $options = [] ): NewSigningKeyInstance {
		$options = new Values( $options );

		$data = Values::of( [ 'FriendlyName' => $options['friendlyName'], ] );

		$payload = $this->version->create( 'POST', $this->uri, [], $data );

		return new NewSigningKeyInstance( $this->version, $payload, $this->solution['accountSid'] );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Api.V2010.NewSigningKeyList]';
	}
}
