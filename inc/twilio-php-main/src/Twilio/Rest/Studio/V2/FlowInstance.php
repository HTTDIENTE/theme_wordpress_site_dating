<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V2;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Rest\Studio\V2\Flow\ExecutionList;
use Twilio\Rest\Studio\V2\Flow\FlowRevisionList;
use Twilio\Rest\Studio\V2\Flow\FlowTestUserList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $accountSid
 * @property string $friendlyName
 * @property array $definition
 * @property string $status
 * @property int $revision
 * @property string $commitMessage
 * @property bool $valid
 * @property array[] $errors
 * @property array[] $warnings
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $webhookUrl
 * @property string $url
 * @property array $links
 */
class FlowInstance extends InstanceResource {
	protected $_revisions;
	protected $_testUsers;
	protected $_executions;

	/**
	 * Initialize the FlowInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $sid The SID that identifies the resource to fetch
	 */
	public function __construct( Version $version, array $payload, string $sid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'sid'           => Values::array_get( $payload, 'sid' ),
			'accountSid'    => Values::array_get( $payload, 'account_sid' ),
			'friendlyName'  => Values::array_get( $payload, 'friendly_name' ),
			'definition'    => Values::array_get( $payload, 'definition' ),
			'status'        => Values::array_get( $payload, 'status' ),
			'revision'      => Values::array_get( $payload, 'revision' ),
			'commitMessage' => Values::array_get( $payload, 'commit_message' ),
			'valid'         => Values::array_get( $payload, 'valid' ),
			'errors'        => Values::array_get( $payload, 'errors' ),
			'warnings'      => Values::array_get( $payload, 'warnings' ),
			'dateCreated'   => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'   => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
			'webhookUrl'    => Values::array_get( $payload, 'webhook_url' ),
			'url'           => Values::array_get( $payload, 'url' ),
			'links'         => Values::array_get( $payload, 'links' ),
		];

		$this->solution = [ 'sid' => $sid ?: $this->properties['sid'], ];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return FlowContext Context for this FlowInstance
	 */
	protected function proxy(): FlowContext {
		if ( ! $this->context ) {
			$this->context = new FlowContext( $this->version, $this->solution['sid'] );
		}

		return $this->context;
	}

	/**
	 * Update the FlowInstance
	 *
	 * @param string $status The status of the Flow
	 * @param array|Options $options Optional Arguments
	 *
	 * @return FlowInstance Updated FlowInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( string $status, array $options = [] ): FlowInstance {
		return $this->proxy()->update( $status, $options );
	}

	/**
	 * Fetch the FlowInstance
	 *
	 * @return FlowInstance Fetched FlowInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): FlowInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Delete the FlowInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->proxy()->delete();
	}

	/**
	 * Access the revisions
	 */
	protected function getRevisions(): FlowRevisionList {
		return $this->proxy()->revisions;
	}

	/**
	 * Access the testUsers
	 */
	protected function getTestUsers(): FlowTestUserList {
		return $this->proxy()->testUsers;
	}

	/**
	 * Access the executions
	 */
	protected function getExecutions(): ExecutionList {
		return $this->proxy()->executions;
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

		return '[Twilio.Studio.V2.FlowInstance ' . \implode( ' ', $context ) . ']';
	}
}
