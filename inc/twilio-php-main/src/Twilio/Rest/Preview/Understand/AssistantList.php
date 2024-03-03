<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AssistantList extends ListResource {
	/**
	 * Construct the AssistantList
	 *
	 * @param Version $version Version that contains the resource
	 */
	public function __construct( Version $version ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [];

		$this->uri = '/Assistants';
	}

	/**
	 * Streams AssistantInstance records from the API as a generator stream.
	 * This operation lazily loads records as efficiently as possible until the
	 * limit
	 * is reached.
	 * The results are returned as a generator, so this operation is memory
	 * efficient.
	 *
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
	public function stream( int $limit = null, $pageSize = null ): Stream {
		$limits = $this->version->readLimits( $limit, $pageSize );

		$page = $this->page( $limits['pageSize'] );

		return $this->version->stream( $page, $limits['limit'], $limits['pageLimit'] );
	}

	/**
	 * Reads AssistantInstance records from the API as a list.
	 * Unlike stream(), this operation is eager and will load `limit` records into
	 * memory before returning.
	 *
	 * @param int $limit Upper limit for the number of records to return. read()
	 *                   guarantees to never return more than limit.  Default is no
	 *                   limit
	 * @param mixed $pageSize Number of records to fetch per request, when not set
	 *                        will use the default value of 50 records.  If no
	 *                        page_size is defined but a limit is defined, read()
	 *                        will attempt to read the limit with the most
	 *                        efficient page size, i.e. min(limit, 1000)
	 *
	 * @return AssistantInstance[] Array of results
	 */
	public function read( int $limit = null, $pageSize = null ): array {
		return \iterator_to_array( $this->stream( $limit, $pageSize ), false );
	}

	/**
	 * Retrieve a single page of AssistantInstance records from the API.
	 * Request is executed immediately
	 *
	 * @param mixed $pageSize Number of records to return, defaults to 50
	 * @param string $pageToken PageToken provided by the API
	 * @param mixed $pageNumber Page Number, this value is simply for client state
	 *
	 * @return AssistantPage Page of AssistantInstance
	 */
	public function page(
		$pageSize = Values::NONE,
		string $pageToken = Values::NONE,
		$pageNumber = Values::NONE
	): AssistantPage {
		$params = Values::of( [ 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize, ] );

		$response = $this->version->page( 'GET', $this->uri, $params );

		return new AssistantPage( $this->version, $response, $this->solution );
	}

	/**
	 * Retrieve a specific page of AssistantInstance records from the API.
	 * Request is executed immediately
	 *
	 * @param string $targetUrl API-generated URL for the requested results page
	 *
	 * @return AssistantPage Page of AssistantInstance
	 */
	public function getPage( string $targetUrl ): AssistantPage {
		$response = $this->version->getDomain()->getClient()->request(
			'GET',
			$targetUrl
		);

		return new AssistantPage( $this->version, $response, $this->solution );
	}

	/**
	 * Create the AssistantInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return AssistantInstance Created AssistantInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function create( array $options = [] ): AssistantInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'FriendlyName'      => $options['friendlyName'],
			'LogQueries'        => Serialize::booleanToString( $options['logQueries'] ),
			'UniqueName'        => $options['uniqueName'],
			'CallbackUrl'       => $options['callbackUrl'],
			'CallbackEvents'    => $options['callbackEvents'],
			'FallbackActions'   => Serialize::jsonObject( $options['fallbackActions'] ),
			'InitiationActions' => Serialize::jsonObject( $options['initiationActions'] ),
			'StyleSheet'        => Serialize::jsonObject( $options['styleSheet'] ),
		] );

		$payload = $this->version->create( 'POST', $this->uri, [], $data );

		return new AssistantInstance( $this->version, $payload );
	}

	/**
	 * Constructs a AssistantContext
	 *
	 * @param string $sid A 34 character string that uniquely identifies this
	 *                    resource.
	 */
	public function getContext( string $sid ): AssistantContext {
		return new AssistantContext( $this->version, $sid );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Preview.Understand.AssistantList]';
	}
}
