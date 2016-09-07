<?php

namespace App\Controller;

use Cake\Network\Http\Client;

/**
 * Products Controller.
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
    public $uses = array();

    public $httpClient;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->httpClient = new Client();
    }

    public function index()
    {
        $session = $this->request->session();
        if ($this->request->is('get')) {

          $products = $this->httpClient->get("http://localhost/magento/rest/default/V1/products", [
            "searchCriteria[filter_groups][0][filters][0][field]"=>"category_id",
            "searchCriteria[filter_groups][0][filters][0][value]"=>"3",
            "searchCriteria[filter_groups][0][filters][0][condition_type]"=> "finset"
          ], ['headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 29h7625dsv3q6ikn3cn9t2o48n7a4ake',
            'Accept' => 'application/json'
          ]])->body();
          $this->set($products);
        }
    }

}
