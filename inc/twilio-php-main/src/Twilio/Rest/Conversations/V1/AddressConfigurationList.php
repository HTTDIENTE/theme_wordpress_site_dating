<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

class AddressConfigurationList extends ListResource {
	/**
	 * Construct the AddressConfigurationList
	 *
	 * @param Version $version Version that contains the resource
	 */
	public function __construct( Version $version ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [];

		$this->uri = '/Configuration/Addresses';
	}

	/**
	 * Streams AddressConfigurationInstance records from the API as a generator
	 * stream.
	 * This operation lazily loads records as efficiently as possible until the
	 * limit
	 * is reached.
	 * The results are returned as a generator, so this operation is memory
	 * efficient.
	 *
	 * @param array|Options $options Optional Arguments
	 * @param int $limit Upper limit for the number of records to return. stream()
	 *                   guarantees to never return more than limit.  Default is no
	 *                   limit
	 * @param mixed $pageSize Number of records to fetch per request, when not set
	 *                        will use the default value of 50 records.  If no
	 *                        page_size is defined but a limit is defined, stream()
	 *                        will attempt to read the limit with the most
	 *                        efficient page size, i.e. min(limit, 1000)
	 *
	 * @return Stream stream of results
	 */
	public function stream( array $options = [], int $limit = null, $pageSize = null ): Stream {
		$limits = $this->version->readLimits( $limit, $pageSize );

		$page = $this->page( $options, $limits['pageSize'] );

		return $this->version->stream( $page, $limits['limit'], $limits['pageLimit'] );
	}

	/**
	 * Reads AddressConfigurationInstance records from the API as a list.
	 * Unlike stream(), this operation is eager and will load `limit` records into
	 * memory before returning.
	 *
	 * @param array|Options $options Optional Arguments
	 * @param int $limit Upper limit for the number of records to return. read()
	 *                   guarantees to never return more than limit.  Default is no
	 *                   limit
	 * @param mixed $pageSize Number of records to fetch per request, when not set
	 *                        will use the default value of 50 records.  If no
	 *                        page_size is defined but a limit is defined, read()
	 *                        will attempt to read the limit with the most
	 *                        efficient page size, i.e. min(limit, 1000)
	 *
	 * @return AddressConfigurationInstance[] Array of results
	 */
	public function read( array $options = [], int $limit = null, $pageSize = null ): array {
		return \iterator_to_array( $this->stream( $options, $limit, $pageSize ), false );
	}

	/**
	 * Retrieve a single page of AddressConfigurationInstance records from the API.
	 * Request is executed immediately
	 *
	 * @param array|Options $options Optional Arguments
	 * @param mixed $pageSize Number of records to return, defaults to 50
	 * @param string $pageToken PageToken provided by the API
	 * @param mixed $pageNumber Page Number, this value is simply for client state
	 *
	 * @return AddressConfigurationPage Page of AddressConfigurationInstance
	 */
	public function page(
		array $options = [],
		$pageSize = Values::NONE,
		string $pageToken = Values::NONE,
		$pageNumber = Values::NONE
	): AddressConfigurationPage {
		$options = new Values( $options );

		$params = Values::of( [
			'Type'      => $options['type'],
			'PageToken' => $pageToken,
			'Page'      => $pageNumber,
			'PageSize'  => $pageSize,
		] );

		$response = $this->version->page( 'GET', $this->uri, $params );

		return new AddressConfigurationPage( $this->version, $response, $this->solution );
	}

	/**
	 * Retrieve a specific page of AddressConfigurationInstance records from the
	 * API.
	 * Request is executed immediately
	 *
	 * @param string $targetUrl API-generated URL for the requested results page
	 *
	 * @return AddressConfigurationPage Page of AddressConfigurationInstance
	 */
	public function getPage( string $targetUrl ): AddressConfigurationPage {
		$response = $this->version->getDomain()->getClient()->request(
			'GET',
			$targetUrl
		);

		return new AddressConfigurationPage( $this->version, $response, $this->solution );
	}

	/**
	 * Create the AddressConfigurationInstance
	 *
	 * @param string $type Type of Address.
	 * @param string $address The unique address to be configured.
	 * @param array|Options $options Optional Arguments
	 *
	 * @return AddressConfigurationInstance Created AddressConfigurationInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function create( string $type, string $address, array $options = [] ): AddressConfigurationInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'Type'                                => $type,
			'Address'                             => $address,
			'FriendlyName'                        => $options['friendlyName'],
			'AutoCreation.Enabled'                => Serialize::booleanToString( $options['autoCreationEnabled'] ),
			'AutoCreation.Type'                   => $options['autoCreationType'],
			'AutoCreation.ConversationServiceSid' => $options['autoCreationConversationServiceSid'],
			'AutoCreation.WebhookUrl'             => $options['autoCreationWebhookUrl'],
			'AutoCreation.WebhookMethod'          => $options['autoCreationWebhookMethod'],
			'AutoCreation.WebhookFilters'         => Serialize::map( $options['autoCreationWebhookFilters'],
				function ( $e ) {
					return $e;
				} ),
			'AutoCreation.StudioFlowSid'          => $options['autoCreationStudioFlowSid'],
			'AutoCreation.StudioRetryCount'       => $options['autoCreationStudioRetryCount'],
		] );

		$payload = $this->version->create( 'POST', $this->uri, [], $data );

		return new AddressConfigurationInstance( $this->version, $payload );
	}

	/**
	 * Constructs a AddressConfigurationContext
	 *
	 * @param string $sid The SID or Address of the Configuration.
	 */
	public function getContext( string $sid ): AddressConfigurationContext {
		return new AddressConfigurationContext( $this->version, $sid );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Conversations.V1.AddressConfigurationList]';
	}
}