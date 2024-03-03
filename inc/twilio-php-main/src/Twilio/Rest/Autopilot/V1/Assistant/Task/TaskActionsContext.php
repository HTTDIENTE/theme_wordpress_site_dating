<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant\Task;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class TaskActionsContext extends InstanceContext {
	/**
	 * Initialize the TaskActionsContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $assistantSid The SID of the Assistant that is the parent of
	 *                             the Task for which the task actions to fetch
	 *                             were defined
	 * @param string $taskSid The SID of the Task for which the task actions to
	 *                        fetch were defined
	 */
	public function __construct( Version $version, $assistantSid, $taskSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'assistantSid' => $assistantSid, 'taskSid' => $taskSid, ];

		$this->uri = '/Assistants/' . \rawurlencode( $assistantSid ) . '/Tasks/' . \rawurlencode( $taskSid ) . '/Actions';
	}

	/**
	 * Fetch the TaskActionsInstance
	 *
	 * @return TaskActionsInstance Fetched TaskActionsInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): TaskActionsInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new TaskActionsInstance(
			$this->version,
			$payload,
			$this->solution['assistantSid'],
			$this->solution['taskSid']
		);
	}

	/**
	 * Update the TaskActionsInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return TaskActionsInstance Updated TaskActionsInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): TaskActionsInstance {
		$options = new Values( $options );

		$data = Values::of( [ 'Actions' => Serialize::jsonObject( $options['actions'] ), ] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new TaskActionsInstance(
			$this->version,
			$payload,
			$this->solution['assistantSid'],
			$this->solution['taskSid']
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

		return '[Twilio.Autopilot.V1.TaskActionsContext ' . \implode( ' ', $context ) . ']';
	}
}
