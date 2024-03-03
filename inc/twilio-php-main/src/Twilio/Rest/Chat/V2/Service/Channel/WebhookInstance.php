<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Chat\V2\Service\Channel;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $channelSid
 * @property string $type
 * @property string $url
 * @property array $configuration
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 */
class WebhookInstance extends InstanceResource {
	/**
	 * Initialize the WebhookInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $serviceSid The SID of the Service that the Channel Webhook
	 *                           resource is associated with
	 * @param string $channelSid The SID of the Channel the Channel Webhook
	 *                           resource belongs to
	 * @param string $sid The SID of the Channel Webhook resource to fetch
	 */
	public function __construct(
		Version $version,
		array $payload,
		string $serviceSid,
		string $channelSid,
		string $sid = null
	) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'           => Values::array_get( $payload, 'sid' ),
			'accountSid'    => Values::array_get( $payload, 'account_sid' ),
			'serviceSid'    => Values::array_get( $payload, 'service_sid' ),
			'channelSid'    => Values::array_get( $payload, 'channel_sid' ),
			'type'          => Values::array_get( $payload, 'type' ),
			'url'           => Values::array_get( $payload, 'url' ),
			'configuration' => Values::array_get( $payload, 'configuration' ),
			'dateCreated'   => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'   => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
		];

		$this->solution = [
			'serviceSid' => $serviceSid,
			'channelSid' => $channelSid,
			'sid'        => $sid ?: $this->properties['sid'],
		];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return WebhookContext Context for this WebhookInstance
	 */
	protected function proxy(): WebhookContext {
		if ( ! $this->context ) {
			$this->context = new WebhookContext(
				$this->version,
				$this->solution['serviceSid'],
				$this->solution['channelSid'],
				$this->solution['sid']
			);
		}

		return $this->context;
	}

	/**
	 * Fetch the WebhookInstance
	 *
	 * @return WebhookInstance Fetched WebhookInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): WebhookInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Update the WebhookInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return WebhookInstance Updated WebhookInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): WebhookInstance {
		return $this->proxy()->update( $options );
	}

	/**
	 * Delete the WebhookInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->proxy()->delete();
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

		return '[Twilio.Chat.V2.WebhookInstance ' . \implode( ' ', $context ) . ']';
	}
}
