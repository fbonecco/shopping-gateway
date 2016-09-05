<?php

namespace App\Controller;

use Cake\Network\Http\Client;

/**
 * Carts Controller.
 *
 * @property \App\Model\Table\CartsTable $Carts
 */
class CartsController extends AppController
{
    public $uses = array();

    public $httpClient;


    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->httpClient = new Client();
    }
    /**
     * Index method.
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $session = $this->request->session();
        if ($this->request->is('get')) {
            $cart_id = $session->read('Cart.id');
            $cart = array("id"=> 1);
            //$cart = $this->httpClient->get("https://jsonplaceholder.typicode.com/posts")->body();

            //$cart = json_decode($cart);
            // debug($cart);
            //$cart = json_decode($cart);
            //if ($cart_id != null) {
                // call magento's api
            //}
            //debug(json_encode($cart));
            $this->log($cart);
            $this->set($cart);
            //$this->set('_serialize', ['cart']);
            //$this->set($cart->json);
        }
    }

    /**
     * View method.
     *
     * @param string|null $id Cart id
     *
     * @return \Cake\Network\Response|null
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found
     */
    public function view($id = null)
    {
        $carts = array('bar' => $id);

        $this->set(compact('carts'));
        $this->set('_serialize', 'carts');
    }

    /**
     * Add method.
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise
     */
    public function add()
    {
        $cart = $this->Carts->newEntity();
        if ($this->request->is('post')) {
            $cart = $this->Carts->patchEntity($cart, $this->request->data);
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cart could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cart'));
        $this->set('_serialize', 'cart');
    }

    /**
     * Edit method.
     *
     * @param string|null $id Cart id
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found
     */
    public function edit($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Carts->patchEntity($cart, $this->request->data);
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cart could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cart'));
        $this->set('_serialize', ['cart']);
    }

    /**
     * Delete method.
     *
     * @param string|null $id Cart id
     *
     * @return \Cake\Network\Response|null Redirects to index
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Carts->get($id);
        if ($this->Carts->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
