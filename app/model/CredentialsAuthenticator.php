<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use Nette\Security\User;
use Nette\InvalidArgumentException;
use Nette\Database\Context;
use Nette\Security\Passwords;
use stdClass;

class CredentialsAuthenticator
{
    /** @var \User **/
    public $user;
    
    /** @var \Context */
    public $database;


    public function __construct(User $user, \Nette\Database\Context $database) {
        $this->user = $user;
        $this->database = $database;
    }
    
    public function login($user, $password) {
        $row = $this->database->table('users')->where('user', $user)->fetch();
        if($row and Passwords::verify($password, $row->password)){
            $arr = $row->toArray();
            $this->user->login(new \Nette\Security\Identity($row->id, $row->user, $arr));
        }
    }
    
    public function logOut() {
        $this->user->logout(TRUE);
    }
}