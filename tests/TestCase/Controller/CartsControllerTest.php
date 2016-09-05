<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\TestSuite\Stub\Response;
//use Cake\Http\Client\Response;
/**
 * App\Controller\CartsController Test Case.
 */
class CartsControllerTest extends IntegrationTestCase
{
    /**
     * Fixtures.
     *
     * @var array
     */
    public $fixtures = [
        //'app.carts',
    ];

    private $clientMock;

    private $response;

    public function setUp()
    {
        parent::setUp();
        $this->clientMock = $this->createMock("Cake\Network\Http\Client");
        // $this->response = $this->createMock("Cake\Http\Client\Response");
        $this->response = new Response(array("body"=> "{\"cart\":{}}", "type"=>"application/json"));
    }

    /**
     * Test index method.
     * No cart_id in session.
     */
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

    /**
     * Test index method.
     * A cart_id in session.
     */
    /*public function testGetWithCartId()
    {
        $this->configRequest([
          'headers' => ['Accept' => 'application/json'],
        ]);
        $result = $this->get('/carts.json');

       // Check that the response was a 200
       $this->assertResponseOk();

        $expected = array('cart');
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }*/

    public function controllerSpy($event, $controller = null)
    {
        parent::controllerSpy($event);

        if (isset($this->_controller)) {
            $this->_controller->httpClient = $this->clientMock;
        }
    }
}
