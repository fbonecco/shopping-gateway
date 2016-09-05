<?php
namespace App\Auth;

use Cake\Auth\DigestAuthenticate;
use Cake\Network\Request;
use Cake\Network\Response;

class CustomAuthenticate extends DigestAuthenticate
{
    public function authenticate(Request $request , Response $response)
    {
        print( "authenticate ");
        return false;
    }

    public function getUser(Request $request) {
      print( "getUser ");
      return false;
    }

    protected function _findUser($username, $password = null) {
          print( "findUser ");
          return false;
    }

}
?>
