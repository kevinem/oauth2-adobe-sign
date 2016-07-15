<?php


namespace KevinEm\OAuth2\Client\Tests;

use KevinEm\OAuth2\Client\AdobeSign;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class AdobeSignTest
 * @package KevinEm\OAuth2\Client\Tests
 */
class AdobeSignTest extends TestCase
{
    /**
     * @var AdobeSign
     */
    protected $provider;

    protected function setUp()
    {
        $this->provider = new AdobeSign([
            'clientId'     => 'mock_client_id',
            'clientSecret' => 'mock_client_secret',
            'redirectUri'  => 'none'
        ]);
    }

    public function testScopes()
    {
        $options = [
            'scope' => [
                'user_login:account',
                'agreement_send:account'
            ]
        ];

        $url = $this->provider->getAuthorizationUrl($options);
        $this->assertContains(implode('+', $options['scope']), $url);
    }

    public function testGetAuthorizationUrl()
    {
        $url = $this->provider->getAuthorizationUrl();
        $uri = parse_url($url);

        $this->assertEquals('secure.na1.echosign.com', $uri['host']);
        $this->assertEquals('/public/oauth', $uri['path']);
    }

    public function testGetAccessTokenUrl()
    {
        $accessToken = [
            'access_token' => 'mock_access_token'
        ];

        $response = m::mock('Psr\Http\Message\ResponseInterface');
        $response->shouldReceive('getBody')->andReturn(json_encode($accessToken));
        $response->shouldReceive('getHeader')->andReturn(['content-type' => 'json']);

        $client = m::mock('GuzzleHttp\ClientInterface');
        $client->shouldReceive('send')->times(1)->andReturn($response);
        $this->provider->setHttpClient($client);

        $token = $this->provider->getAccessToken('authorization_code', ['code' => 'mock_authorization_code']);

        $this->assertEquals($token->getToken(), 'mock_access_token');
    }
}