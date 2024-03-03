<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class StyleSheetList extends ListResource {
	/**
	 * Construct the StyleSheetList
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $assistantSid The SID of the Assistant that is the parent of
	 *                             the resource
	 */
	public function __construct( Version $version, string $assistantSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'assistantSid' => $assistantSid, ];
	}

	/**
	 * Constructs a StyleSheetContext
	 */
	public function getContext(): StyleSheetContext {
		return new StyleSheetContext( $this->version, $this->solution['assistantSid'] );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Autopilot.V1.StyleSheetList]';
	}
}
