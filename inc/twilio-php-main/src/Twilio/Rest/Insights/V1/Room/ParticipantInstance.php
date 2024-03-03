<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Insights\V1\Room;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $participantSid
 * @property string $participantIdentity
 * @property \DateTime $joinTime
 * @property \DateTime $leaveTime
 * @property string $durationSec
 * @property string $accountSid
 * @property string $roomSid
 * @property string $status
 * @property string[] $codecs
 * @property string $endReason
 * @property int $errorCode
 * @property string $errorCodeUrl
 * @property string $mediaRegion
 * @property array $properties
 * @property string $edgeLocation
 * @property array $publisherInfo
 * @property string $url
 */
class ParticipantInstance extends InstanceResource {
	/**
	 * Initialize the ParticipantInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $roomSid Unique identifier for the room.
	 * @param string $participantSid The SID of the Participant resource.
	 */
	public function __construct( Version $version, array $payload, string $roomSid, string $participantSid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'participantSid'      => Values::array_get( $payload, 'participant_sid' ),
			'participantIdentity' => Values::array_get( $payload, 'participant_identity' ),
			'joinTime'            => Deserialize::dateTime( Values::array_get( $payload, 'join_time' ) ),
			'leaveTime'           => Deserialize::dateTime( Values::array_get( $payload, 'leave_time' ) ),
			'durationSec'         => Values::array_get( $payload, 'duration_sec' ),
			'accountSid'          => Values::array_get( $payload, 'account_sid' ),
			'roomSid'             => Values::array_get( $payload, 'room_sid' ),
			'status'              => Values::array_get( $payload, 'status' ),
			'codecs'              => Values::array_get( $payload, 'codecs' ),
			'endReason'           => Values::array_get( $payload, 'end_reason' ),
			'errorCode'           => Values::array_get( $payload, 'error_code' ),
			'errorCodeUrl'        => Values::array_get( $payload, 'error_code_url' ),
			'mediaRegion'         => Values::array_get( $payload, 'media_region' ),
			'properties'          => Values::array_get( $payload, 'properties' ),
			'edgeLocation'        => Values::array_get( $payload, 'edge_location' ),
			'publisherInfo'       => Values::array_get( $payload, 'publisher_info' ),
			'url'                 => Values::array_get( $payload, 'url' ),
		];

		$this->solution = [
			'roomSid'        => $roomSid,
			'participantSid' => $participantSid ?: $this->properties['participantSid'],
		];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return ParticipantContext Context for this ParticipantInstance
	 */
	protected function proxy(): ParticipantContext {
		if ( ! $this->context ) {
			$this->context = new ParticipantContext(
				$this->version,
				$this->solution['roomSid'],
				$this->solution['participantSid']
			);
		}

		return $this->context;
	}

	/**
	 * Fetch the ParticipantInstance
	 *
	 * @return ParticipantInstance Fetched ParticipantInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): ParticipantInstance {
		return $this->proxy()->fetch();
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

		return '[Twilio.Insights.V1.ParticipantInstance ' . \implode( ' ', $context ) . ']';
	}
}