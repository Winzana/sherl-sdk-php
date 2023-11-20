<?php
use PHPUnit\Framework\TestCase;
use Sherl\Sdk\Common\SherlClient;

class SherlClientTest extends TestCase
{
    private $sherlClient;

    protected function setUp(): void
    {
        require __DIR__ . '/vendor/autoload.php';
        $env = parse_ini_file('.env');

        $this->sherlClient = new SherlClient(
            $env['API_KEY'],
            $env['API_SECRET'],
            "http://localhost:4200",
            "https://api.sandbox.sherl.io"
        );

        $login = $this->sherlClient->auth->signInWithEmailAndPassword($env['USERNAME'], $env['PASSWORD']);
        $this->sherlClient->registerAuthToken($login->access_token);
    }

    public function testSignInWithEmailAndPassword(): void
    {
        $env = parse_ini_file('.env');
        $login = $this->sherlClient->auth->signInWithEmailAndPassword($env['USERNAME'], $env['PASSWORD']);
        
        $this->assertNotNull($login);
        $this->assertNotEmpty($login->access_token);
    }

    public function testGetMe(): void
    {
        $me = $this->sherlClient->person->getMe();
        $this->assertNotNull($me);
        // Ajouter plus d'assertions ?
    }

    public function testInitSDK()
    {
        $options = $this->sherlClient->getOptions();

        $env = parse_ini_file('.env');
        $this->assertEquals($env['API_KEY'], $options['apiKey']);
        $this->assertEquals($env['API_SECRET'], $options['apiSecret']);
        $this->assertEquals("http://localhost:4200", $options['referer']);
    }

    public function testInitWithInvalidArguments()
    {
        $this->expectException(\Exception::class);
        new SherlClient(null, null, null);
    }
}
