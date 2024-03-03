<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class SigningKeyOptions {
	/**
	 * @param string $friendlyName The friendly_name
	 *
	 * @return UpdateSigningKeyOptions Options builder
	 */
	public static function update( string $friendlyName = Values::NONE ): UpdateSigningKeyOptions {
		return new UpdateSigningKeyOptions( $friendlyName );
	}
}

class UpdateSigningKeyOptions extends Options {
	/**
	 * @param string $friendlyName The friendly_name
	 */
	public function __construct( string $friendlyName = Values::NONE ) {
		$this->options['friendlyName'] = $friendlyName;
	}

	/**
	 * The friendly_name
	 *
	 * @param string $friendlyName The friendly_name
	 *
	 * @return $this Fluent Builder
	 */
	public function setFriendlyName( string $friendlyName ): self {
		$this->options['friendlyName'] = $friendlyName;

		return $this;
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		$options = \http_build_query( Values::of( $this->options ), '', ' ' );

		return '[Twilio.Api.V2010.UpdateSigningKeyOptions ' . $options . ']';
	}
}
