<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class TaskChannelContext extends InstanceContext {
	/**
	 * Initialize the TaskChannelContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $workspaceSid The SID of the Workspace with the Task Channel
	 *                             to fetch
	 * @param string $sid The SID of the Task Channel resource to fetch
	 */
	public function __construct( Version $version, $workspaceSid, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'workspaceSid' => $workspaceSid, 'sid' => $sid, ];

		$this->uri = '/Workspaces/' . \rawurlencode( $workspaceSid ) . '/TaskChannels/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the TaskChannelInstance
	 *
	 * @return TaskChannelInstance Fetched TaskChannelInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): TaskChannelInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new TaskChannelInstance(
			$this->version,
			$payload,
			$this->solution['workspaceSid'],
			$this->solution['sid']
		);
	}

	/**
	 * Update the TaskChannelInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return TaskChannelInstance Updated TaskChannelInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): TaskChannelInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'FriendlyName'            => $options['friendlyName'],
			'ChannelOptimizedRouting' => Serialize::booleanToString( $options['channelOptimizedRouting'] ),
		] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new TaskChannelInstance(
			$this->version,
			$payload,
			$this->solution['workspaceSid'],
			$this->solution['sid']
		);
	}

	/**
	 * Delete the TaskChannelInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->version->delete( 'DELETE', $this->uri );
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

		return '[Twilio.Taskrouter.V1.TaskChannelContext ' . \implode( ' ', $context ) . ']';
	}
}
