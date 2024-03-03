<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V2\Service\User;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class UserChannelContext extends InstanceContext {
	/**
	 * Initialize the UserChannelContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $serviceSid The service_sid
	 * @param string $userSid The user_sid
	 * @param string $channelSid The channel_sid
	 */
	public function __construct( Version $version, $serviceSid, $userSid, $channelSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'serviceSid' => $serviceSid, 'userSid' => $userSid, 'channelSid' => $channelSid, ];

		$this->uri = '/Services/' . \rawurlencode( $serviceSid ) . '/Users/' . \rawurlencode( $userSid ) . '/Channels/' . \rawurlencode( $channelSid ) . '';
	}

	/**
	 * Fetch the UserChannelInstance
	 *
	 * @return UserChannelInstance Fetched UserChannelInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): UserChannelInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new UserChannelInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['userSid'],
			$this->solution['channelSid']
		);
	}

	/**
	 * Delete the UserChannelInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->version->delete( 'DELETE', $this->uri );
	}

	/**
	 * Update the UserChannelInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return UserChannelInstance Updated UserChannelInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): UserChannelInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'NotificationLevel'        => $options['notificationLevel'],
			'LastConsumedMessageIndex' => $options['lastConsumedMessageIndex'],
			'LastConsumptionTimestamp' => Serialize::iso8601DateTime( $options['lastConsumptionTimestamp'] ),
		] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new UserChannelInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['userSid'],
			$this->solution['channelSid']
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

		return '[Twilio.IpMessaging.V2.UserChannelContext ' . \implode( ' ', $context ) . ']';
	}
}
