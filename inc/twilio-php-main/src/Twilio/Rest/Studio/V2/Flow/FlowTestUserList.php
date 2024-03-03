<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V2\Flow;

use Twilio\ListResource;
use Twilio\Version;

class FlowTestUserList extends ListResource {
	/**
	 * Construct the FlowTestUserList
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sid Unique identifier of the flow.
	 */
	public function __construct( Version $version, string $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sid' => $sid, ];
	}

	/**
	 * Constructs a FlowTestUserContext
	 */
	public function getContext(): FlowTestUserContext {
		return new FlowTestUserContext( $this->version, $this->solution['sid'] );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Studio.V2.FlowTestUserList]';
	}
}
