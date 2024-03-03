<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1\Configuration;

use Twilio\ListResource;
use Twilio\Version;

class WebhookList extends ListResource {
	/**
	 * Construct the WebhookList
	 *
	 * @param Version $version Version that contains the resource
	 */
	public function __construct( Version $version ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [];
	}

	/**
	 * Constructs a WebhookContext
	 */
	public function getContext(): WebhookContext {
		return new WebhookContext( $this->version );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Conversations.V1.WebhookList]';
	}
}
