<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class WebhookContext extends InstanceContext {
	/**
	 * Initialize the WebhookContext
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $assistantSid The SID of the Assistant that is the parent of
	 *                             the resource to fetch
	 * @param string $sid The unique string that identifies the resource to fetch
	 */
	public function __construct( Version $version, $assistantSid, $sid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'assistantSid' => $assistantSid, 'sid' => $sid, ];

		$this->uri = '/Assistants/' . \rawurlencode( $assistantSid ) . '/Webhooks/' . \rawurlencode( $sid ) . '';
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
			$this->solution['assistantSid'],
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
			'UniqueName'    => $options['uniqueName'],
			'Events'        => $options['events'],
			'WebhookUrl'    => $options['webhookUrl'],
			'WebhookMethod' => $options['webhookMethod'],
		] );

		$payload = $this->version->update( 'POST', $this->uri, [], $data );

		return new WebhookInstance(
			$this->version,
			$payload,
			$this->solution['assistantSid'],
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

		return '[Twilio.Autopilot.V1.WebhookContext ' . \implode( ' ', $context ) . ']';
	}
}
