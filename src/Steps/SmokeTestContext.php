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
        $this->response = new Response();
    }

    /**
     * @When /^I send a request with (.*)$/
     */
    public function iSendARequestWith($uri)
    {
        $url = $this->getMinkParameter('base_url') . $uri;
        $this->response->body = $this->response->getCurlResponse($url);
    }

    /**
     * @Then /^I should get a response with (.*)$/
     */
    public function iShouldGetAResponseWith($statusCode)
    {
        preg_match("/1.1 ([^\r]*)/", $this->response->body, $matches);
        $actualCodeResponse = $matches[1];

        \PHPUnit_Framework_Assert::assertEquals(
            $statusCode,
            $actualCodeResponse,
            "Response code is not " . $statusCode
        );
    }

}