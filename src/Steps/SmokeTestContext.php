<?php

namespace src\Steps;

use Behat\Behat\Tester\Exception\PendingException;
use src\Data\Response;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

class SmokeTestContext extends BaseContext
{
    /**
     * @var \src\Data\Response
     */
    private $response;

    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function beforeScenario(BeforeScenarioScope $scope)
    {
        $this->response = null;
    }

    /**
     * @When /^I send a request with (.*)$/
     */
    public function iSendARequestWith($uri)
    {
        $baseUrl = $this->getMinkParameter('base_url');

        if (!isset ($baseUrl)) {
            throw new \LogicException("URL {$baseUrl} is undefined");
        }

        $this->response = Response::fromUrl($baseUrl . $uri);
    }

    /**
     * @Then /^I should get a response with (.*)$/
     */
    public function iShouldGetAResponseWith($statusCode)
    {
        if (!$this->response) {
            throw new \LogicException('Request was not sent');
        }

        \PHPUnit_Framework_Assert::assertSame(
            $statusCode,
            $this->response->statusCode,
            "Response code '{$this->response->statusCode}' is not '{$statusCode}'. Requested url '{$this->response->url}'"
        );
    }
}