<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers;

class CustomerService extends \Stripe\Service\AbstractService {
    /**
     * Create an incoming testmode bank transfer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function fundCashBalance( $id, $params = null, $opts = null ) {
        return $this->request( 'post', $this->buildPath( '/v1/test_helpers/customers/%s/fund_cash_balance', $id ),
            $params, $opts );
    }
}
