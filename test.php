<?php
use PHPUnit\Framework\TestCase;
use Sherl\Sdk\Common\SherlClient;
use Sherl\Sdk\Auth\AuthProvider;
use Sherl\Sdk\Person\PersonProvider;

use Sherl\Sdk\Auth\Dto\LoginOutputDto;
use Sherl\Sdk\Common\InitOptions;

use Sherl\Sdk\Common\Error\SherlException;

class SherlClientTest extends TestCase
{
    private $sherlClient;

    protected function setUp(): void
    {
      require __DIR__ . '/vendor/autoload.php';

      $this->mockSherlClient = $this->createMock(SherlClient::class);
      $this->mockAuthProvider = $this->createMock(AuthProvider::class);

      // SHERL CLIENT
      $options = [
        'apiKey' => 'API_KEY',
        'apiSecret' => 'API_SECRET',
        'referer' => 'http://localhost:4200'
      ];

      $fakeInitOptions = new InitOptions();
      $fakeInitOptions->apiKey = 'b97cdb70-6a81-45f7-9004-44e85ac98975';
      $fakeInitOptions->apiSecret = '24b78f5d-577b-4ecf-8fe3-3874ad14edef';
      $fakeInitOptions->referer = 'http://localhost:4200';
  
      $this->mockSherlClient->method('getOptions')
                            ->willReturn($fakeInitOptions);

      // AUTH PROVIDER
      $fakeLoginOutputDto = new LoginOutputDto();
      $fakeLoginOutputDto->access_token = 'fake_token';

      $this->mockAuthProvider->method('signInWithEmailAndPassword')
                            ->willReturn($fakeLoginOutputDto);
    }

    public function testSignInWithEmailAndPassword(): void
    {
        $login = $this->mockAuthProvider->signInWithEmailAndPassword('fake_user', 'fake_pass');
        
        $this->assertNotNull($login);
        $this->assertEquals('fake_token', $login->access_token);
    }

    public function testInitSDK()
    {
        $options = $this->mockSherlClient->getOptions();

        $env = parse_ini_file('.env');
        $this->assertEquals($env['API_KEY'], $options->apiKey);
        $this->assertEquals($env['API_SECRET'], $options->apiSecret);
        $this->assertEquals('http://localhost:4200', $options->referer);
    }

    public function testInitWithInvalidArguments()
    {
      $this->expectException(TypeError::class);

      new SherlClient(null, null, null);
    }
}
