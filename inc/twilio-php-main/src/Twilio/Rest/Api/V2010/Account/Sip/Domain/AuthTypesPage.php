<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\Domain;

use Twilio\Http\Response;
use Twilio\Page;
use Twilio\Version;

class AuthTypesPage extends Page {
	/**
	 * @param Version $version Version that contains the resource
	 * @param Response $response Response from the API
	 * @param array $solution The context solution
	 */
	public function __construct( Version $version, Response $response, array $solution ) {
		parent::__construct( $version, $response );

		// Path Solution
		$this->solution = $solution;
	}

	/**
	 * @param array $payload Payload response from the API
	 *
	 * @return AuthTypesInstance \Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypesInstance
	 */
	public function buildInstance( array $payload ): AuthTypesInstance {
		return new AuthTypesInstance(
			$this->version,
			$payload,
			$this->solution['accountSid'],
			$this->solution['domainSid']
		);
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Api.V2010.AuthTypesPage]';
	}
}
