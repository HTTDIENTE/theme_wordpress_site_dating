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

class WorkspaceCumulativeStatisticsContext extends InstanceContext {
	/**
	 * Initialize the WorkspaceCumulativeStatisticsContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $workspaceSid The SID of the Workspace to fetch
	 */
	public function __construct( Version $version, $workspaceSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'workspaceSid' => $workspaceSid, ];

		$this->uri = '/Workspaces/' . \rawurlencode( $workspaceSid ) . '/CumulativeStatistics';
	}

	/**
	 * Fetch the WorkspaceCumulativeStatisticsInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return WorkspaceCumulativeStatisticsInstance Fetched
	 *                                               WorkspaceCumulativeStatisticsInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch( array $options = [] ): WorkspaceCumulativeStatisticsInstance {
		$options = new Values( $options );

		$params = Values::of( [
			'EndDate'         => Serialize::iso8601DateTime( $options['endDate'] ),
			'Minutes'         => $options['minutes'],
			'StartDate'       => Serialize::iso8601DateTime( $options['startDate'] ),
			'TaskChannel'     => $options['taskChannel'],
			'SplitByWaitTime' => $options['splitByWaitTime'],
		] );

		$payload = $this->version->fetch( 'GET', $this->uri, $params );

		return new WorkspaceCumulativeStatisticsInstance(
			$this->version,
			$payload,
			$this->solution['workspaceSid']
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

		return '[Twilio.Taskrouter.V1.WorkspaceCumulativeStatisticsContext ' . \implode( ' ', $context ) . ']';
	}
}