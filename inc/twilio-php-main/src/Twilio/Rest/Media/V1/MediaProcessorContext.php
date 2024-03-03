<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Media\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class MediaProcessorContext extends InstanceContext {
	/**
	 * Initialize the MediaProcessorContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sid The SID that identifies the resource to fetch
	 */
	public function __construct( Version $version, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sid' => $sid, ];

		$this->uri = '/MediaProcessors/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the MediaProcessorInstance
	 *
	 * @return MediaProcessorInstance Fetched MediaProcessorInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): MediaProcessorInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new MediaProcessorInstance( $this->version, $payload, $this->solution['sid'] );
	}

	/**
	 * Update the MediaProcessorInstance
	 *
	 * @param string $status The status of the MediaProcessor
	 *
	 * @return MediaProcessorInstance Updated MediaProcessorInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( string $status ): MediaProcessorInstance {
		$data = Values::of( [ 'Status' => $status, ] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new MediaProcessorInstance( $this->version, $payload, $this->solution['sid'] );
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

		return '[Twilio.Media.V1.MediaProcessorContext ' . \implode( ' ', $context ) . ']';
	}
}
