<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\components;


class PriceOfferPresenter extends BasePresenter
{
    private $id; // ID CP alebo usera
    private $entity;
    
    public function startup() {
        parent::startup();
        $roles_accept = 'admin,manager,sales,buyer';
        if(!$this->loginTest($roles_accept)) {
            !$this->user->loggedIn ? $this->flashMessage('Pre využívanie aplikácie je potrebné prihlásenie.', 'info') : $this->flashMessage('Nemáš dostatočné práva.', 'info');
            $this->redirect('Homepage:');
        }
    }
    
    public function createComponentPriceOfferForm() {
        $form = $this->priceOfferFormFactory->create($this->entity);
        
        $form->onFormSucces[] = function () {
            $this->flashMessage('Cenová ponuka bola uložená.');
            $this->redirect('PriceOffer:AllPriceOffers');
        };
        return $form;
    }
    
    public function renderDefault() {
        
    }

    public function actionAllPriceOffers() {
        
    }
    
    public function renderAllPriceOffers() {
        $this->template->priceOffers = $this->priceOfferManager->getAllPriceOffer();
    }
    
    public function actionAddPriceOffer($id = null) {
        // prevedie $id na cislo a ulozi do $this->id
        $this->id = intval($id);
    }
    
    public function renderAddPriceOffer() {
        $this->entity = $this->template->priceOffer = $this->priceOfferManager->getOnePriceOffer($this->id);
        $this->template->id = $this->id;
    }
    
    public function actionDeletePriceOffer($id = null) {

    }
    
    public function renderDeletePriceOffer() {
        
    }
}
