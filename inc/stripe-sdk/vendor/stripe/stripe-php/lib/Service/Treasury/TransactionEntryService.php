<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Treasury;

class TransactionEntryService extends \Stripe\Service\AbstractService {
    /**
     * Retrieves a list of TransactionEntry objects.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Treasury\TransactionEntry>
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function all( $params = null, $opts = null ) {
        return $this->requestCollection( 'get', '/v1/treasury/transaction_entries', $params, $opts );
    }

    /**
     * Retrieves a TransactionEntry object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\TransactionEntry
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function retrieve( $id, $params = null, $opts = null ) {
        return $this->request( 'get', $this->buildPath( '/v1/treasury/transaction_entries/%s', $id ), $params, $opts );
    }
}
