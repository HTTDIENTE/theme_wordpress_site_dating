<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\ListResource;
use Twilio\Rest\Video\V1\Room\ParticipantList;
use Twilio\Rest\Video\V1\Room\RecordingRulesList;
use Twilio\Rest\Video\V1\Room\RoomRecordingList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property RoomRecordingList $recordings
 * @property ParticipantList $participants
 * @property RecordingRulesList $recordingRules
 * @method \Twilio\Rest\Video\V1\Room\RoomRecordingContext recordings( string $sid )
 * @method \Twilio\Rest\Video\V1\Room\ParticipantContext participants( string $sid )
 */
class RoomContext extends InstanceContext {
	protected $_recordings;
	protected $_participants;
	protected $_recordingRules;

	/**
	 * Initialize the RoomContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $sid The SID that identifies the resource to fetch
	 */
	public function __construct( Version $version, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'sid' => $sid, ];

		$this->uri = '/Rooms/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the RoomInstance
	 *
	 * @return RoomInstance Fetched RoomInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): RoomInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new RoomInstance( $this->version, $payload, $this->solution['sid'] );
	}

	/**
	 * Update the RoomInstance
	 *
	 * @param string $status The new status of the resource
	 *
	 * @return RoomInstance Updated RoomInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( string $status ): RoomInstance {
		$data = Values::of( [ 'Status' => $status, ] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new RoomInstance( $this->version, $payload, $this->solution['sid'] );
	}

	/**
	 * Access the recordings
	 */
	protected function getRecordings(): RoomRecordingList {
		if ( ! $this->_recordings ) {
			$this->_recordings = new RoomRecordingList( $this->version, $this->solution['sid'] );
		}

		return $this->_recordings;
	}

	/**
	 * Access the participants
	 */
	protected function getParticipants(): ParticipantList {
		if ( ! $this->_participants ) {
			$this->_participants = new ParticipantList( $this->version, $this->solution['sid'] );
		}

		return $this->_participants;
	}

	/**
	 * Access the recordingRules
	 */
	protected function getRecordingRules(): RecordingRulesList {
		if ( ! $this->_recordingRules ) {
			$this->_recordingRules = new RecordingRulesList( $this->version, $this->solution['sid'] );
		}

		return $this->_recordingRules;
	}

	/**
	 * Magic getter to lazy load subresources
	 *
	 * @param string $name Subresource to return
	 *
	 * @return ListResource The requested subresource
	 * @throws TwilioException For unknown subresources
	 */
	public function __get( string $name ): ListResource {
		if ( \property_exists( $this, '_' . $name ) ) {
			$method = 'get' . \ucfirst( $name );

			return $this->$method();
		}

		throw new TwilioException( 'Unknown subresource ' . $name );
	}

	/**
	 * Magic caller to get resource contexts
	 *
	 * @param string $name Resource to return
	 * @param array $arguments Context parameters
	 *
	 * @return InstanceContext The requested resource context
	 * @throws TwilioException For unknown resource
	 */
	public function __call( string $name, array $arguments ): InstanceContext {
		$property = $this->$name;
		if ( \method_exists( $property, 'getContext' ) ) {
			return \call_user_func_array( array( $property, 'getContext' ), $arguments );
		}

		throw new TwilioException( 'Resource does not have a context' );
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

		return '[Twilio.Video.V1.RoomContext ' . \implode( ' ', $context ) . ']';
	}
}
