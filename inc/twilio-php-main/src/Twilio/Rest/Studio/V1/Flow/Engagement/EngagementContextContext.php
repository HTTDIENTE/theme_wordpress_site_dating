<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V1\Flow\Engagement;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class EngagementContextContext extends InstanceContext {
	/**
	 * Initialize the EngagementContextContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $flowSid Flow SID
	 * @param string $engagementSid Engagement SID
	 */
	public function __construct( Version $version, $flowSid, $engagementSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'flowSid' => $flowSid, 'engagementSid' => $engagementSid, ];

		$this->uri = '/Flows/' . \rawurlencode( $flowSid ) . '/Engagements/' . \rawurlencode( $engagementSid ) . '/Context';
	}

	/**
	 * Fetch the EngagementContextInstance
	 *
	 * @return EngagementContextInstance Fetched EngagementContextInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): EngagementContextInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new EngagementContextInstance(
			$this->version,
			$payload,
			$this->solution['flowSid'],
			$this->solution['engagementSid']
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

		return '[Twilio.Studio.V1.EngagementContextContext ' . \implode( ' ', $context ) . ']';
	}
}
