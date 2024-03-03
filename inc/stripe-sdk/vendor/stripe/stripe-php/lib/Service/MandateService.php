<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class MandateService extends \Stripe\Service\AbstractService {
    /**
     * Retrieves a Mandate object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Mandate
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function retrieve( $id, $params = null, $opts = null ) {
        return $this->request( 'get', $this->buildPath( '/v1/mandates/%s', $id ), $params, $opts );
    }
}
