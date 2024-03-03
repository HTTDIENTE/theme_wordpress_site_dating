<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trusthub\V1\CustomerProfiles;

use Twilio\Options;
use Twilio\Values;

abstract class CustomerProfilesChannelEndpointAssignmentOptions {
	/**
	 * @param string $channelEndpointSid The sid of an channel endpoint
	 * @param string $channelEndpointSids comma separated list of channel endpoint
	 *                                    sids
	 *
	 * @return ReadCustomerProfilesChannelEndpointAssignmentOptions Options builder
	 */
	public static function read(
		string $channelEndpointSid = Values::NONE,
		string $channelEndpointSids = Values::NONE
	): ReadCustomerProfilesChannelEndpointAssignmentOptions {
		return new ReadCustomerProfilesChannelEndpointAssignmentOptions( $channelEndpointSid, $channelEndpointSids );
	}
}

class ReadCustomerProfilesChannelEndpointAssignmentOptions extends Options {
	/**
	 * @param string $channelEndpointSid The sid of an channel endpoint
	 * @param string $channelEndpointSids comma separated list of channel endpoint
	 *                                    sids
	 */
	public function __construct(
		string $channelEndpointSid = Values::NONE,
		string $channelEndpointSids = Values::NONE
	) {
		$this->options['channelEndpointSid'] = $channelEndpointSid;
		$this->options['channelEndpointSids'] = $channelEndpointSids;
	}

	/**
	 * The SID of an channel endpoint
	 *
	 * @param string $channelEndpointSid The sid of an channel endpoint
	 *
	 * @return $this Fluent Builder
	 */
	public function setChannelEndpointSid( string $channelEndpointSid ): self {
		$this->options['channelEndpointSid'] = $channelEndpointSid;

		return $this;
	}

	/**
	 * comma separated list of channel endpoint sids
	 *
	 * @param string $channelEndpointSids comma separated list of channel endpoint
	 *                                    sids
	 *
	 * @return $this Fluent Builder
	 */
	public function setChannelEndpointSids( string $channelEndpointSids ): self {
		$this->options['channelEndpointSids'] = $channelEndpointSids;

		return $this;
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		$options = \http_build_query( Values::of( $this->options ), '', ' ' );

		return '[Twilio.Trusthub.V1.ReadCustomerProfilesChannelEndpointAssignmentOptions ' . $options . ']';
	}
}
