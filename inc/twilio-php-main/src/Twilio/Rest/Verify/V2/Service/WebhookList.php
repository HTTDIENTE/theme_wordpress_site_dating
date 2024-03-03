<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class WebhookList extends ListResource {
	/**
	 * Construct the WebhookList
	 *
	 * @param Version $version Version that contains the resource
	 * @param string $serviceSid Service Sid.
	 */
	public function __construct( Version $version, string $serviceSid ) {
		parent::__construct( $version );

		// Path Solution
		$this->solution = [ 'serviceSid' => $serviceSid, ];

		$this->uri = '/Services/' . \rawurlencode( $serviceSid ) . '/Webhooks';
	}

	/**
	 * Create the WebhookInstance
	 *
	 * @param string $friendlyName The string that you assigned to describe the
	 *                             webhook
	 * @param string[] $eventTypes The array of events that this Webhook is
	 *                             subscribed to.
	 * @param string $webhookUrl The URL associated with this Webhook.
	 * @param array|Options $options Optional Arguments
	 *
	 * @return WebhookInstance Created WebhookInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function create(
		string $friendlyName,
		array $eventTypes,
		string $webhookUrl,
		array $options = []
	): WebhookInstance {
		$options = new Values( $options );

		$data = Values::of( [
			'FriendlyName' => $friendlyName,
			'EventTypes'   => Serialize::map( $eventTypes, function ( $e ) {
				return $e;
			} ),
			'WebhookUrl'   => $webhookUrl,
			'Status'       => $options['status'],
			'Version'      => $options['version'],
		] );

		$payload = $this->version->create( 'POST', $this->uri, [], $data );

		return new WebhookInstance( $this->version, $payload, $this->solution['serviceSid'] );
	}

	/**
	 * Streams WebhookInstance records from the API as a generator stream.
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
	 * Reads WebhookInstance records from the API as a list.
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
	 * @return WebhookInstance[] Array of results
	 */
	public function read( int $limit = null, $pageSize = null ): array {
		return \iterator_to_array( $this->stream( $limit, $pageSize ), false );
	}

	/**
	 * Retrieve a single page of WebhookInstance records from the API.
	 * Request is executed immediately
	 *
	 * @param mixed $pageSize Number of records to return, defaults to 50
	 * @param string $pageToken PageToken provided by the API
	 * @param mixed $pageNumber Page Number, this value is simply for client state
	 *
	 * @return WebhookPage Page of WebhookInstance
	 */
	public function page(
		$pageSize = Values::NONE,
		string $pageToken = Values::NONE,
		$pageNumber = Values::NONE
	): WebhookPage {
		$params = Values::of( [ 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize, ] );

		$response = $this->version->page( 'GET', $this->uri, $params );

		return new WebhookPage( $this->version, $response, $this->solution );
	}

	/**
	 * Retrieve a specific page of WebhookInstance records from the API.
	 * Request is executed immediately
	 *
	 * @param string $targetUrl API-generated URL for the requested results page
	 *
	 * @return WebhookPage Page of WebhookInstance
	 */
	public function getPage( string $targetUrl ): WebhookPage {
		$response = $this->version->getDomain()->getClient()->request(
			'GET',
			$targetUrl
		);

		return new WebhookPage( $this->version, $response, $this->solution );
	}

	/**
	 * Constructs a WebhookContext
	 *
	 * @param string $sid The unique string that identifies the resource to fetch
	 */
	public function getContext( string $sid ): WebhookContext {
		return new WebhookContext( $this->version, $this->solution['serviceSid'], $sid );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		return '[Twilio.Verify.V2.WebhookList]';
	}
}
