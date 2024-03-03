<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Task;

use Twilio\Http\Response;
use Twilio\Page;
use Twilio\Version;

class ReservationPage extends Page {
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
	 * @return ReservationInstance \Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationInstance
	 */
	public function buildInstance( array $payload ): ReservationInstance {
		return new ReservationInstance(
			$this->version,
			$payload,
			$this->solution['workspaceSid'],
			$this->solution['taskSid']
		);
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Taskrouter.V1.ReservationPage]';
	}
}
