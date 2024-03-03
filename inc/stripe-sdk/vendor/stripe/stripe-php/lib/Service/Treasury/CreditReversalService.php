<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Treasury;

class CreditReversalService extends \Stripe\Service\AbstractService {
    /**
     * Returns a list of CreditReversals.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Treasury\CreditReversal>
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function all( $params = null, $opts = null ) {
        return $this->requestCollection( 'get', '/v1/treasury/credit_reversals', $params, $opts );
    }

    /**
     * Reverses a ReceivedCredit and creates a CreditReversal object.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\CreditReversal
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function create( $params = null, $opts = null ) {
        return $this->request( 'post', '/v1/treasury/credit_reversals', $params, $opts );
    }

    /**
     * Retrieves the details of an existing CreditReversal by passing the unique
     * CreditReversal ID from either the CreditReversal creation request or
     * CreditReversal list.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Treasury\CreditReversal
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function retrieve( $id, $params = null, $opts = null ) {
        return $this->request( 'get', $this->buildPath( '/v1/treasury/credit_reversals/%s', $id ), $params, $opts );
    }
}
