<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public $uses = array();

    public function initialize()
    {
        parent::initialize();

    }

    public function login()
    {

        $this->set('_serialize', 'a');
    }
}
