<?php
use PHPUnit\Framework\TestCase;
use Sherl\Sdk\Common\SherlClient;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class SherlClientTest extends TestCase
{
    private $sherlClient;
    private $mockHandler;
    private $handlerStack;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler([new Response(200)]);

        $this->handlerStack = HandlerStack::create($this->mockHandler);

        $client = new Client(['handler' => $this->handlerStack]);

        $this->sherlClient = new SherlClient('apiKey', 'apiSecret', 'http://localhost:4200');
        $this->setPrivateProperty($this->sherlClient, 'client', $client);
        $this->setPrivateProperty($this->sherlClient, 'handlerStack', $this->handlerStack);
    }

    private function setPrivateProperty($object, $propertyName, $value)
    {
        $reflector = new \ReflectionObject($object);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $value);
    }

    /**
     * Test Init Sherl SDK method
     *
     * Check if initSDK method inserts well
     * apiKey, apiSecret, referer and apiUrl
     * args in SherlClient
     */
    public function testInitSdk(): void
    {
        $apiKey = 'test_api_key';
        $apiSecret = 'test_api_secret';
        $referer = 'http://localhost:4200';
        $apiUrl = 'http://test.url';

        $sherlClient = new SherlClient($apiKey, $apiSecret, $referer, $apiUrl);
        $options = $sherlClient->getOptions();

        $this->assertNotNull($options);
        $this->assertEquals($apiKey, $options->apiKey);
        $this->assertEquals($apiSecret, $options->apiSecret);
        $this->assertEquals($referer, $options->referer);
        $this->assertEquals($apiUrl, $options->apiUrl);
    }

    /**
     * Test RegisterBearerToken method
     *
     * This method ensures that the SherlClient can register a Bearer authentication token
     * and correctly add it to the HTTP request headers. The test simulates
     * a request and checks if the 'Authorization' header contains the expected Bearer token
     */
    public function testRegisterBearerToken(): void
    {
        $token = 'test_token';
        $this->sherlClient->registerBearerToken($token);
        $this->sherlClient->getClient()->request('GET', 'http://test');
        $lastRequest = $this->mockHandler->getLastRequest();
        $this->assertEquals('Bearer ' . $token, $lastRequest->getHeaderLine('Authorization'));
    }
}
