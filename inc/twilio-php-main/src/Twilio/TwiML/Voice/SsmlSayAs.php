<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlSayAs extends TwiML {
	/**
	 * SsmlSayAs constructor.
	 *
	 * @param string $words Words to be interpreted
	 * @param array $attributes Optional attributes
	 */
	public function __construct( $words, $attributes = [] ) {
		parent::__construct( 'say-as', $words, $attributes );
	}

	/**
	 * Add Interpret-As attribute.
	 *
	 * @param string $interpretAs Specify the type of words are spoken
	 */
	public function setInterpretAs( $interpretAs ): self {
		return $this->setAttribute( 'interpret-as', $interpretAs );
	}

	/**
	 * Add Role attribute.
	 *
	 * @param string $role Specify the format of the date when interpret-as is set
	 *                     to date
	 */
	public function setRole( $role ): self {
		return $this->setAttribute( 'role', $role );
	}
}