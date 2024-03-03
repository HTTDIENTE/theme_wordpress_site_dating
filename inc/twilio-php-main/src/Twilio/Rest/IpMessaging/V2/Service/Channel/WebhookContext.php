<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V2\Service\Channel;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class WebhookContext extends InstanceContext {
	/**
	 * Initialize the WebhookContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $serviceSid The service_sid
	 * @param string $channelSid The channel_sid
	 * @param string $sid The sid
	 */
	public function __construct( Version $version, $serviceSid, $channelSid, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'serviceSid' => $serviceSid, 'channelSid' => $channelSid, 'sid' => $sid, ];

		$this->uri = '/Services/' . \rawurlencode( $serviceSid ) . '/Channels/' . \rawurlencode( $channelSid ) . '/Webhooks/' . \rawurlencode( $sid ) . '';
	}

	/**
	 * Fetch the WebhookInstance
	 *
	 * @return WebhookInstance Fetched WebhookInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): WebhookInstance {
		$payload = $this->version->fetch( 'GET', $this->uri );

		return new WebhookInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['channelSid'],
			$this->solution['sid']
		);
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
		$options = new Values( $options );

		$data = Values::of( [
			'Configuration.Url'        => $options['configurationUrl'],
			'Configuration.Method'     => $options['configurationMethod'],
			'Configuration.Filters'    => Serialize::map( $options['configurationFilters'], function ( $e ) {
				return $e;
			} ),
			'Configuration.Triggers'   => Serialize::map( $options['configurationTriggers'], function ( $e ) {
				return $e;
			} ),
			'Configuration.FlowSid'    => $options['configurationFlowSid'],
			'Configuration.RetryCount' => $options['configurationRetryCount'],
		] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new WebhookInstance(
			$this->version,
			$payload,
			$this->solution['serviceSid'],
			$this->solution['channelSid'],
			$this->solution['sid']
		);
	}

	/**
	 * Delete the WebhookInstance
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

		return '[Twilio.IpMessaging.V2.WebhookContext ' . \implode( ' ', $context ) . ']';
	}
}
