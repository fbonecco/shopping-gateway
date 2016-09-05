<?php
namespace App\Auth;

use Cake\Auth\DigestAuthenticate;
use Cake\Network\Request;
use Cake\Network\Response;

class CustomAuthenticate extends DigestAuthenticate
{

    protected function _findUser($username, $password = null) {
          return array("id"=> 1, "username" => "cf6806763bc430bcc08b9436b6a35fd8", "password"=>"cf6806763bc430bcc08b9436b6a35fd8", "role"=>"admin");
    }

}
?>
