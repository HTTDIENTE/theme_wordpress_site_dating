<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Reject extends TwiML {
	/**
	 * Reject constructor.
	 *
	 * @param array $attributes Optional attributes
	 */
	public function __construct( $attributes = [] ) {
		parent::__construct( 'Reject', null, $attributes );
	}

	/**
	 * Add Reason attribute.
	 *
	 * @param string $reason Rejection reason
	 */
	public function setReason( $reason ): self {
		return $this->setAttribute( 'reason', $reason );
	}
}
