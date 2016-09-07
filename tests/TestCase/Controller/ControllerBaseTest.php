<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ControllerBaseTest extends IntegrationTestCase
{
    /**
     * Fixtures.
     *
     * @var array
     */
    public $fixtures = [
        //'app.carts',
    ];

    protected $clientMock;

    protected $response;

    public function setUp()
    {
        parent::setUp();
        $this->clientMock = $this->createMock("Cake\Network\Http\Client");
    }

    public function controllerSpy($event, $controller = null)
    {
        parent::controllerSpy($event);

        if (isset($this->_controller)) {
            $this->_controller->httpClient = $this->clientMock;
        }
    }

    public function readFile($path = null) {
      if ($path) {
        $file = new File($path);
        $contents = $file->read();
        $file->close();
        return $contents;
      }
    }
}
