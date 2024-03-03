<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Insights\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Rest\Insights\V1\Room\ParticipantList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $accountSid
 * @property string $roomSid
 * @property string $roomName
 * @property \DateTime $createTime
 * @property \DateTime $endTime
 * @property string $roomType
 * @property string $roomStatus
 * @property string $statusCallback
 * @property string $statusCallbackMethod
 * @property string $createdMethod
 * @property string $endReason
 * @property int $maxParticipants
 * @property int $uniqueParticipants
 * @property int $uniqueParticipantIdentities
 * @property int $concurrentParticipants
 * @property int $maxConcurrentParticipants
 * @property string[] $codecs
 * @property string $mediaRegion
 * @property string $durationSec
 * @property string $totalParticipantDurationSec
 * @property string $totalRecordingDurationSec
 * @property string $processingState
 * @property bool $recordingEnabled
 * @property string $edgeLocation
 * @property string $url
 * @property array $links
 */
class RoomInstance extends InstanceResource {
	protected $_participants;

	/**
	 * Initialize the RoomInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $roomSid The SID of the Room resource.
	 */
	public function __construct( Version $version, array $payload, string $roomSid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'accountSid'                  => Values::array_get( $payload, 'account_sid' ),
			'roomSid'                     => Values::array_get( $payload, 'room_sid' ),
			'roomName'                    => Values::array_get( $payload, 'room_name' ),
			'createTime'                  => Deserialize::dateTime( Values::array_get( $payload, 'create_time' ) ),
			'endTime'                     => Deserialize::dateTime( Values::array_get( $payload, 'end_time' ) ),
			'roomType'                    => Values::array_get( $payload, 'room_type' ),
			'roomStatus'                  => Values::array_get( $payload, 'room_status' ),
			'statusCallback'              => Values::array_get( $payload, 'status_callback' ),
			'statusCallbackMethod'        => Values::array_get( $payload, 'status_callback_method' ),
			'createdMethod'               => Values::array_get( $payload, 'created_method' ),
			'endReason'                   => Values::array_get( $payload, 'end_reason' ),
			'maxParticipants'             => Values::array_get( $payload, 'max_participants' ),
			'uniqueParticipants'          => Values::array_get( $payload, 'unique_participants' ),
			'uniqueParticipantIdentities' => Values::array_get( $payload, 'unique_participant_identities' ),
			'concurrentParticipants'      => Values::array_get( $payload, 'concurrent_participants' ),
			'maxConcurrentParticipants'   => Values::array_get( $payload, 'max_concurrent_participants' ),
			'codecs'                      => Values::array_get( $payload, 'codecs' ),
			'mediaRegion'                 => Values::array_get( $payload, 'media_region' ),
			'durationSec'                 => Values::array_get( $payload, 'duration_sec' ),
			'totalParticipantDurationSec' => Values::array_get( $payload, 'total_participant_duration_sec' ),
			'totalRecordingDurationSec'   => Values::array_get( $payload, 'total_recording_duration_sec' ),
			'processingState'             => Values::array_get( $payload, 'processing_state' ),
			'recordingEnabled'            => Values::array_get( $payload, 'recording_enabled' ),
			'edgeLocation'                => Values::array_get( $payload, 'edge_location' ),
			'url'                         => Values::array_get( $payload, 'url' ),
			'links'                       => Values::array_get( $payload, 'links' ),
		];

		$this->solution = [ 'roomSid' => $roomSid ?: $this->properties['roomSid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return RoomContext Context for this RoomInstance
	 */
	protected function proxy(): RoomContext {
		if ( ! $this->context ) {
			$this->context = new RoomContext( $this->version, $this->solution['roomSid'] );
		}

		return $this->context;
	}

	/**
	 * Fetch the RoomInstance
	 *
	 * @return RoomInstance Fetched RoomInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): RoomInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Access the participants
	 */
	protected function getParticipants(): ParticipantList {
		return $this->proxy()->participants;
	}

	/**
	 * Magic getter to access properties
	 *
	 * @param string $name Property to access
	 *
	 * @return mixed The requested property
	 * @throws TwilioException For unknown properties
	 */
	public function __get( string $name ) {
		if ( \array_key_exists( $name, $this->properties ) ) {
			return $this->properties[ $name ];
		}

		if ( \property_exists( $this, '_' . $name ) ) {
			$method = 'get' . \ucfirst( $name );

			return $this->$method();
		}

		throw new TwilioException( 'Unknown property: ' . $name );
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

		return '[Twilio.Insights.V1.RoomInstance ' . \implode( ' ', $context ) . ']';
	}
}
