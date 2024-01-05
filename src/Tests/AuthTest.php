<?php

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

// PROVIDER
use Sherl\Sdk\Auth\AuthProvider;

// DTOS
use Sherl\Sdk\Auth\Dto\LoginOutputDto;

class AuthTest extends TestCase
{
    /**
     * @var AuthProvider|MockObject $authProvider
     */
    private $authProvider;

    protected function setUp(): void
    {
        require __DIR__ . '/../../vendor/autoload.php';

        $this->authProvider = $this->createMock(AuthProvider::class);

        $fakeLoginOutputDto = new LoginOutputDto();
        $fakeLoginOutputDto->access_token = 'fake_token';

        $this->authProvider
            ->method('signInWithEmailAndPassword')
            ->willReturn($fakeLoginOutputDto);
    }

    public function testSignInWithEmailAndPassword(): void
    {
        $email = 'test@example.com';
        $password = 'password';

        // @phpstan-ignore-next-line
        $result = $this->authProvider->signInWithEmailAndPassword($email, $password);

        $this->assertInstanceOf(LoginOutputDto::class, $result);
        $this->assertEquals('fake_token', $result->access_token);
    }

}
