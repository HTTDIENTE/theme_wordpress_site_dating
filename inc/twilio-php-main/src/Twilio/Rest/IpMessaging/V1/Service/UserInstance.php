<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V1\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Rest\IpMessaging\V1\Service\User\UserChannelList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $attributes
 * @property string $friendlyName
 * @property string $roleSid
 * @property string $identity
 * @property bool $isOnline
 * @property bool $isNotifiable
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property int $joinedChannelsCount
 * @property array $links
 * @property string $url
 */
class UserInstance extends InstanceResource {
	protected $_userChannels;

	/**
	 * Initialize the UserInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $serviceSid The service_sid
	 * @param string $sid The sid
	 */
	public function __construct( Version $version, array $payload, string $serviceSid, string $sid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'                 => Values::array_get( $payload, 'sid' ),
			'accountSid'          => Values::array_get( $payload, 'account_sid' ),
			'serviceSid'          => Values::array_get( $payload, 'service_sid' ),
			'attributes'          => Values::array_get( $payload, 'attributes' ),
			'friendlyName'        => Values::array_get( $payload, 'friendly_name' ),
			'roleSid'             => Values::array_get( $payload, 'role_sid' ),
			'identity'            => Values::array_get( $payload, 'identity' ),
			'isOnline'            => Values::array_get( $payload, 'is_online' ),
			'isNotifiable'        => Values::array_get( $payload, 'is_notifiable' ),
			'dateCreated'         => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'         => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
			'joinedChannelsCount' => Values::array_get( $payload, 'joined_channels_count' ),
			'links'               => Values::array_get( $payload, 'links' ),
			'url'                 => Values::array_get( $payload, 'url' ),
		];

		$this->solution = [ 'serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return UserContext Context for this UserInstance
	 */
	protected function proxy(): UserContext {
		if ( ! $this->context ) {
			$this->context = new UserContext(
				$this->version,
				$this->solution['serviceSid'],
				$this->solution['sid']
			);
		}

		return $this->context;
	}

	/**
	 * Fetch the UserInstance
	 *
	 * @return UserInstance Fetched UserInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): UserInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Delete the UserInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->proxy()->delete();
	}

	/**
	 * Update the UserInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return UserInstance Updated UserInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): UserInstance {
		return $this->proxy()->update( $options );
	}

	/**
	 * Access the userChannels
	 */
	protected function getUserChannels(): UserChannelList {
		return $this->proxy()->userChannels;
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

		return '[Twilio.IpMessaging.V1.UserInstance ' . \implode( ' ', $context ) . ']';
	}
}
