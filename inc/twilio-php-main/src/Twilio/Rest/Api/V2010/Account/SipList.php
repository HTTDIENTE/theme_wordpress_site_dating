<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\ListResource;
use Twilio\Rest\Api\V2010\Account\Sip\CredentialListList;
use Twilio\Rest\Api\V2010\Account\Sip\DomainList;
use Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlListList;
use Twilio\Version;

/**
 * @property DomainList $domains
 * @property IpAccessControlListList $ipAccessControlLists
 * @property CredentialListList $credentialLists
 * @method \Twilio\Rest\Api\V2010\Account\Sip\DomainContext domains( string $sid )
 * @method \Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlListContext ipAccessControlLists( string $sid )
 * @method \Twilio\Rest\Api\V2010\Account\Sip\CredentialListContext credentialLists( string $sid )
 */
class SipList extends ListResource {
	protected $_domains = null;
	protected $_ipAccessControlLists = null;
	protected $_credentialLists = null;

	/**
	 * Construct the SipList
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $accountSid A 34 character string that uniquely identifies
	 *                           this resource.
	 */
	public function __construct( Version $version, string $accountSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'accountSid' => $accountSid, ];
	}

	/**
	 * Access the domains
	 */
	protected function getDomains(): DomainList {
		if ( ! $this->_domains ) {
			$this->_domains = new DomainList( $this->version, $this->solution['accountSid'] );
		}

		return $this->_domains;
	}

	/**
	 * Access the ipAccessControlLists
	 */
	protected function getIpAccessControlLists(): IpAccessControlListList {
		if ( ! $this->_ipAccessControlLists ) {
			$this->_ipAccessControlLists = new IpAccessControlListList(
				$this->version,
				$this->solution['accountSid']
			);
		}

		return $this->_ipAccessControlLists;
	}

	/**
	 * Access the credentialLists
	 */
	protected function getCredentialLists(): CredentialListList {
		if ( ! $this->_credentialLists ) {
			$this->_credentialLists = new CredentialListList( $this->version, $this->solution['accountSid'] );
		}

		return $this->_credentialLists;
	}

	/**
	 * Magic getter to lazy load subresources
	 *
	 * @param string $name Subresource to return
	 *
	 * @return \Twilio\ListResource The requested subresource
	 * @throws TwilioException For unknown subresources
	 */
	public function __get( string $name ) {
		if ( \property_exists( $this, '_' . $name ) ) {
			$method = 'get' . \ucfirst( $name );

			return $this->$method();
		}

		throw new TwilioException( 'Unknown subresource ' . $name );
	}

	/**
	 * Magic caller to get resource contexts
	 *
	 * @param string $name Resource to return
	 * @param array $arguments Context parameters
	 *
	 * @return InstanceContext The requested resource context
	 * @throws TwilioException For unknown resource
	 */
	public function __call( string $name, array $arguments ): InstanceContext {
		$property = $this->$name;
		if ( \method_exists( $property, 'getContext' ) ) {
			return \call_user_func_array( array( $property, 'getContext' ), $arguments );
		}

		throw new TwilioException( 'Resource does not have a context' );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Api.V2010.SipList]';
	}
}
