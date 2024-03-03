<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand\Assistant;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AssistantInitiationActionsList extends ListResource {
	/**
	 * Construct the AssistantInitiationActionsList
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $assistantSid The assistant_sid
	 */
	public function __construct( Version $version, string $assistantSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'assistantSid' => $assistantSid, ];
	}

	/**
	 * Constructs a AssistantInitiationActionsContext
	 */
	public function getContext(): AssistantInitiationActionsContext {
		return new AssistantInitiationActionsContext( $this->version, $this->solution['assistantSid'] );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Preview.Understand.AssistantInitiationActionsList]';
	}
}
