<?php namespace Mamor;

use Curl\Curl;

class HipChatTest extends \PHPUnit_Framework_TestCase
{
    const AUTH_TOKEN = 'AUTH_TOKEN';

    /**
     * @test
     */
    public function testGet()
    {
        $hipChat = $this->getMock(HipChat::class, ['request'], [static::AUTH_TOKEN]);
        $hipChat->expects($this->once())
            ->method('request')
            ->with('get', 'foo/bar/baz', ['xxx' => 'yyy'])
            ->willReturn('response');

        $this->assertTrue($hipChat->get('foo/bar/baz', ['xxx' => 'yyy']) === 'response');
    }

    /**
     * @test
     */
    public function testPost()
    {
        $hipChat = $this->getMock(HipChat::class, ['request'], [static::AUTH_TOKEN]);
        $hipChat->expects($this->once())
            ->method('request')
            ->with('post', 'foo/bar/baz', ['xxx' => 'yyy'])
            ->willReturn('response');

        $this->assertTrue($hipChat->post('foo/bar/baz', ['xxx' => 'yyy']) === 'response');
    }

    /**
     * @test
     */
    public function testPut()
    {
        $hipChat = $this->getMock(HipChat::class, ['request'], [static::AUTH_TOKEN]);
        $hipChat->expects($this->once())
            ->method('request')
            ->with('put', 'foo/bar/baz', ['xxx' => 'yyy'])
            ->willReturn('response');

        $this->assertTrue($hipChat->put('foo/bar/baz', ['xxx' => 'yyy']) === 'response');
    }

    /**
     * @test
     */
    public function testPatch()
    {
        $hipChat = $this->getMock(HipChat::class, ['request'], [static::AUTH_TOKEN]);
        $hipChat->expects($this->once())
            ->method('request')
            ->with('patch', 'foo/bar/baz', ['xxx' => 'yyy'])
            ->willReturn('response');

        $this->assertTrue($hipChat->patch('foo/bar/baz', ['xxx' => 'yyy']) === 'response');
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $hipChat = $this->getMock(HipChat::class, ['request'], [static::AUTH_TOKEN]);
        $hipChat->expects($this->once())
            ->method('request')
            ->with('delete', 'foo/bar/baz', ['xxx' => 'yyy'])
            ->willReturn('response');

        $this->assertTrue($hipChat->delete('foo/bar/baz', ['xxx' => 'yyy']) === 'response');
    }

    /**
     * @test
     */
    public function testHead()
    {
        $hipChat = $this->getMock(HipChat::class, ['request'], [static::AUTH_TOKEN]);
        $hipChat->expects($this->once())
            ->method('request')
            ->with('head', 'foo/bar/baz', ['xxx' => 'yyy'])
            ->willReturn('response');

        $this->assertTrue($hipChat->head('foo/bar/baz', ['xxx' => 'yyy']) === 'response');
    }

    /**
     * @test
     */
    public function testOptions()
    {
        $hipChat = $this->getMock(HipChat::class, ['request'], [static::AUTH_TOKEN]);
        $hipChat->expects($this->once())
            ->method('request')
            ->with('options', 'foo/bar/baz', ['xxx' => 'yyy'])
            ->willReturn('response');

        $this->assertTrue($hipChat->options('foo/bar/baz', ['xxx' => 'yyy']) === 'response');
    }

    /**
     * @test
     */
    public function testCurl()
    {
        $hipChat = new HipChat(static::AUTH_TOKEN);
        $this->assertTrue($hipChat->curl() instanceof Curl);

        $hipChat = new HipChat(static::AUTH_TOKEN, 'curl');
        $this->assertTrue($hipChat->curl() === 'curl');
    }

    /**
     * @test
     */
    public function testRequest()
    {
        $curl = $this->getMock(Curl::class, ['get']);

        $curl->expects($this->exactly(2))
            ->method('get')
            ->with('https://api.hipchat.com/v2/foo/bar/baz', ['auth_token' => static::AUTH_TOKEN, 'xxx' => 'yyy'])
            ->willReturn('response');

        $hipChat = new HipChat(static::AUTH_TOKEN, $curl);

        $reflection = new \ReflectionClass($hipChat);
        $method = $reflection->getMethod('request');
        $method->setAccessible(true);

        $this->assertTrue($method->invokeArgs($hipChat, ['get', 'v2/foo/bar/baz', ['xxx' => 'yyy']]) === 'response');
        $this->assertTrue($method->invokeArgs($hipChat, ['get', '/v2/foo/bar/baz', ['xxx' => 'yyy']]) === 'response');
    }
}
