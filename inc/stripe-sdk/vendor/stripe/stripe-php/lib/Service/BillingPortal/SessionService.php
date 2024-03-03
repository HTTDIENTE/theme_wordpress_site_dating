<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\BillingPortal;

class SessionService extends \Stripe\Service\AbstractService {
    /**
     * Creates a session of the customer portal.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BillingPortal\Session
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function create( $params = null, $opts = null ) {
        return $this->request( 'post', '/v1/billing_portal/sessions', $params, $opts );
    }
}
