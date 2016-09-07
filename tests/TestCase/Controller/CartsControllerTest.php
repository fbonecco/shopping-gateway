<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\TestSuite\Stub\Response;
use App\Test\TestCase\Controller\ControllerBaseTest;

/**
 * App\Controller\CartsController Test Case.
 */
class CartsControllerTest extends ControllerBaseTest
{
    public function setUp()
    {
        parent::setUp();
        $this->response = new Response(array('body' => '{"cart":{}}', 'type' => 'application/json'));
    }

    public function testGet()
    {
        //$this->response->method('_json')->willReturn('{}');
        $this->clientMock->method('get')->willReturn($this->response);
        $this->configRequest([
          'headers' => ['Accept' => 'application/json'],
        ]);

        $result = $this->get('/api/carts.json');

      // Check that the response was a 200
        $this->assertResponseOk();

        $expected = array('cart');
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $result);
    }
}
