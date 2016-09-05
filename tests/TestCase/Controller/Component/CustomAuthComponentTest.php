<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CustomAuthComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CustomAuthComponent Test Case
 */
class CustomAuthComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\CustomAuthComponent
     */
    public $CustomAuth;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->CustomAuth = new CustomAuthComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomAuth);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
