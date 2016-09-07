<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\Stub\Response;
/**
 * App\Controller\ProductsController Test Case.
 */
class ProductsControllerTest extends ControllerBaseTest
{
    public function testGet()
    {
        $jsonResponse = $this->readFile('tests/comparisons/products.json');

        $this->response = new Response(array('body' => $jsonResponse, 'type' => 'application/json'));

        $this->clientMock->method('get')->willReturn($this->response);

        $this->configRequest([
          'headers' => ['Accept' => 'application/json'],
        ]);

        $this->get('/api/products.json');
        $expected = json_encode($jsonResponse, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());

        // Check that the response was a 200
        $this->assertResponseOk();

        //debug($result);

        // $expected = json_encode($expected, JSON_PRETTY_PRINT);
        // $this->assertEquals($expected, $result);
    }
}
