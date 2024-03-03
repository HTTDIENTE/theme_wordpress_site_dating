<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Events\V1;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class SchemaList extends ListResource {
	/**
	 * Construct the SchemaList
	 *
	 * @param Version $version Version that contains the resource
	 */
	public function __construct( Version $version ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [];
	}

	/**
	 * Constructs a SchemaContext
	 *
	 * @param string $id The unique identifier of the schema.
	 */
	public function getContext( string $id ): SchemaContext {
		return new SchemaContext( $this->version, $id );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Events.V1.SchemaList]';
	}
}
