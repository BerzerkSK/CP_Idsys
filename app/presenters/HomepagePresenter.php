<?php

namespace App\Presenters;



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HomepagePresenter extends BasePresenter {

    public function renderDefault() {
        
    }
    
    public function actionSignOut() {
        $this->credentialsAuthenticator->logOut();
        $this->session->destroy();
        $this->flashMessage('Bol si odhlásený.');
        $this->redirect('Homepage:');
    }
}