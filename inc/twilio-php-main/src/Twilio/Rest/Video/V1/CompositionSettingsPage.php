<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\Http\Response;
use Twilio\Page;
use Twilio\Version;

class CompositionSettingsPage extends Page {
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
	 * @return CompositionSettingsInstance \Twilio\Rest\Video\V1\CompositionSettingsInstance
	 */
	public function buildInstance( array $payload ): CompositionSettingsInstance {
		return new CompositionSettingsInstance( $this->version, $payload );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Video.V1.CompositionSettingsPage]';
	}
}
