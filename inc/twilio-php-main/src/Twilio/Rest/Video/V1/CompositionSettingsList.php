<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\ListResource;
use Twilio\Version;

class CompositionSettingsList extends ListResource {
	/**
	 * Construct the CompositionSettingsList
	 *
	 * @param Version $version Version that contains the resource
	 */
	public function __construct( Version $version ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [];
	}

	/**
	 * Constructs a CompositionSettingsContext
	 */
	public function getContext(): CompositionSettingsContext {
		return new CompositionSettingsContext( $this->version );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Video.V1.CompositionSettingsList]';
	}
}