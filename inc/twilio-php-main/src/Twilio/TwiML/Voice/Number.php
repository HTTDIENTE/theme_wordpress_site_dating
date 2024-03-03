<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Number extends TwiML {
	/**
	 * Number constructor.
	 *
	 * @param string $phoneNumber Phone Number to dial
	 * @param array $attributes Optional attributes
	 */
	public function __construct( $phoneNumber, $attributes = [] ) {
		parent::__construct( 'Number', $phoneNumber, $attributes );
	}

	/**
	 * Add SendDigits attribute.
	 *
	 * @param string $sendDigits DTMF tones to play when the call is answered
	 */
	public function setSendDigits( $sendDigits ): self {
		return $this->setAttribute( 'sendDigits', $sendDigits );
	}

	/**
	 * Add Url attribute.
	 *
	 * @param string $url TwiML URL
	 */
	public function setUrl( $url ): self {
		return $this->setAttribute( 'url', $url );
	}

	/**
	 * Add Method attribute.
	 *
	 * @param string $method TwiML URL method
	 */
	public function setMethod( $method ): self {
		return $this->setAttribute( 'method', $method );
	}

	/**
	 * Add StatusCallbackEvent attribute.
	 *
	 * @param string[] $statusCallbackEvent Events to call status callback
	 */
	public function setStatusCallbackEvent( $statusCallbackEvent ): self {
		return $this->setAttribute( 'statusCallbackEvent', $statusCallbackEvent );
	}

	/**
	 * Add StatusCallback attribute.
	 *
	 * @param string $statusCallback Status callback URL
	 */
	public function setStatusCallback( $statusCallback ): self {
		return $this->setAttribute( 'statusCallback', $statusCallback );
	}

	/**
	 * Add StatusCallbackMethod attribute.
	 *
	 * @param string $statusCallbackMethod Status callback URL method
	 */
	public function setStatusCallbackMethod( $statusCallbackMethod ): self {
		return $this->setAttribute( 'statusCallbackMethod', $statusCallbackMethod );
	}

	/**
	 * Add Byoc attribute.
	 *
	 * @param string $byoc BYOC trunk SID (Beta)
	 */
	public function setByoc( $byoc ): self {
		return $this->setAttribute( 'byoc', $byoc );
	}
}
