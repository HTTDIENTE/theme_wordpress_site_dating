<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant\Task;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $taskSid
 * @property string $language
 * @property string $assistantSid
 * @property string $sid
 * @property string $taggedText
 * @property string $url
 * @property string $sourceChannel
 */
class SampleInstance extends InstanceResource {
	/**
	 * Initialize the SampleInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $assistantSid The SID of the Assistant that is the parent of
	 *                             the Task associated with the resource
	 * @param string $taskSid The SID of the Task associated with the resource
	 * @param string $sid The unique string that identifies the resource
	 */
	public function __construct(
		Version $version,
		array $payload,
		string $assistantSid,
		string $taskSid,
		string $sid = null
	) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'accountSid'    => Values::array_get( $payload, 'account_sid' ),
			'dateCreated'   => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'   => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
			'taskSid'       => Values::array_get( $payload, 'task_sid' ),
			'language'      => Values::array_get( $payload, 'language' ),
			'assistantSid'  => Values::array_get( $payload, 'assistant_sid' ),
			'sid'           => Values::array_get( $payload, 'sid' ),
			'taggedText'    => Values::array_get( $payload, 'tagged_text' ),
			'url'           => Values::array_get( $payload, 'url' ),
			'sourceChannel' => Values::array_get( $payload, 'source_channel' ),
		];

		$this->solution = [
			'assistantSid' => $assistantSid,
			'taskSid'      => $taskSid,
			'sid'          => $sid ?: $this->properties['sid'],
		];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return SampleContext Context for this SampleInstance
	 */
	protected function proxy(): SampleContext {
		if ( ! $this->context ) {
			$this->context = new SampleContext(
				$this->version,
				$this->solution['assistantSid'],
				$this->solution['taskSid'],
				$this->solution['sid']
			);
		}

		return $this->context;
	}

	/**
	 * Fetch the SampleInstance
	 *
	 * @return SampleInstance Fetched SampleInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): SampleInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Update the SampleInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return SampleInstance Updated SampleInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): SampleInstance {
		return $this->proxy()->update( $options );
	}

	/**
	 * Delete the SampleInstance
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

		return '[Twilio.Autopilot.V1.SampleInstance ' . \implode( ' ', $context ) . ']';
	}
}
