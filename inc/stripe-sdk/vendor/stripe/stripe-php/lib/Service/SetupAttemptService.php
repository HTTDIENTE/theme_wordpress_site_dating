<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class SetupAttemptService extends \Stripe\Service\AbstractService {
    /**
     * Returns a list of SetupAttempts associated with a provided SetupIntent.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\SetupAttempt>
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     */
    public function all( $params = null, $opts = null ) {
        return $this->requestCollection( 'get', '/v1/setup_attempts', $params, $opts );
    }
}
