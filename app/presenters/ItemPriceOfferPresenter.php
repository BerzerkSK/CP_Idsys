<?php
namespace App\Presenters;

use Nette;
use App\Model;
use App\components;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ItemPriceOfferPresenter extends BasePresenter
{
    private $id;
    private $entity;

    public function startup() {
        parent::startup();
        $roles_accept = 'admin,manager,sales,buyer';
        if(!$this->loginTest($roles_accept)) {
            !$this->user->loggedIn ? $this->flashMessage('Pre využívanie aplikácie je potrebné prihlásenie.', 'info') : $this->flashMessage('Nemáš dostatočné práva.', 'info');
            $this->redirect('Homepage:');
        }
    }
    
    public function createComponentItemPriceOfferForm() {
        $form = $this->itemPriceOfferFormFactory->create($this->id);
        
        $form->onItemFormSucces[] = function () {
            $this->flashMessage('Položka bola uložená.');
            $this->redirect('PriceOffer:actionAllPriceOffers');
        };
        return $form;
    }
    
    public function createComponentPriceOfferForm() {
        $form = $this->priceOfferFormFactory->create($this->entity);
        
        $form->onFormSucces[] = function () {
            $this->flashMessage('Cenová ponuka bola uložená.');
            $this->redirect('PriceOffer:AllPriceOffers');
        };
        return $form;
    }
    
    public function actionAddItem($id) {
        $this->id = intval($id);
    }
    public function renderAddItem($param) {
        
    }
}