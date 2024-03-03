<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Lookups\V1;
use Twilio\Rest\Lookups\V2;

/**
 * @property \Twilio\Rest\Lookups\V1 $v1
 * @property \Twilio\Rest\Lookups\V2 $v2
 * @property \Twilio\Rest\Lookups\V1\PhoneNumberList $phoneNumbers
 * @method \Twilio\Rest\Lookups\V1\PhoneNumberContext phoneNumbers( string $phoneNumber )
 */
class Lookups extends Domain {
	protected $_v1;
	protected $_v2;

	/**
	 * Construct the Lookups Domain
	 *
	 * @param Client $client Client to communicate with Twilio
	 */
	public function __construct( Client $client ) {
		parent::__construct( $client );

		$this->baseUrl = 'https://lookups.twilio.com';
	}

	/**
	 * @return V1 Version v1 of lookups
	 */
	protected function getV1(): V1 {
		if ( ! $this->_v1 ) {
			$this->_v1 = new V1( $this );
		}

		return $this->_v1;
	}

	/**
	 * @return V2 Version v2 of lookups
	 */
	protected function getV2(): V2 {
		if ( ! $this->_v2 ) {
			$this->_v2 = new V2( $this );
		}

		return $this->_v2;
	}

	/**
	 * Magic getter to lazy load version
	 *
	 * @param string $name Version to return
	 *
	 * @return \Twilio\Version The requested version
	 * @throws TwilioException For unknown versions
	 */
	public function __get( string $name ) {
		$method = 'get' . \ucfirst( $name );
		if ( \method_exists( $this, $method ) ) {
			return $this->$method();
		}

		throw new TwilioException( 'Unknown version ' . $name );
	}

	/**
	 * Magic caller to get resource contexts
	 *
	 * @param string $name Resource to return
	 * @param array $arguments Context parameters
	 *
	 * @return \Twilio\InstanceContext The requested resource context
	 * @throws TwilioException For unknown resource
	 */
	public function __call( string $name, array $arguments ) {
		$method = 'context' . \ucfirst( $name );
		if ( \method_exists( $this, $method ) ) {
			return \call_user_func_array( [ $this, $method ], $arguments );
		}

		throw new TwilioException( 'Unknown context ' . $name );
	}

	protected function getPhoneNumbers(): \Twilio\Rest\Lookups\V1\PhoneNumberList {
		return $this->v1->phoneNumbers;
	}

	/**
	 * @param string $phoneNumber The phone number to fetch in E.164 format
	 */
	protected function contextPhoneNumbers( string $phoneNumber ): \Twilio\Rest\Lookups\V1\PhoneNumberContext {
		return $this->v1->phoneNumbers( $phoneNumber );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Lookups]';
	}
}
