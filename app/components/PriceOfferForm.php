<?php

namespace App\components;

use Nette\Application\UI;
use App\Model;
use App\components;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PriceOfferForm extends UI\Control
{
    public $onFormSucces;
    private $param = null;
    private $priceOfferManager;
    private $user;

    public function __construct($param = null, Model\PriceOfferManager $priceOfferManager, \Nette\Security\User $user) {
        parent::__construct();
        $this->param = $param;
        $this->priceOfferManager = $priceOfferManager;
        $this->user = $user;
    }

    public function createComponentPriceOfferForm() {
        $form = new UI\Form;

        $number = '2018/0001'; // provizorne cislo CP
        $form->addText('number', 'Ponuka číslo:')
                ->setDisabled()
                ->setDefaultValue($number);
        $form->addHidden('trader', $this->user->getId());
        $form->addText('company', 'Firma:', 50, 100)
                ->setRequired();
        $form->addText('client', 'Klient:', 50, 100)
                ->setRequired();
        $form->addText('contact_tel', 'Telefón:', 20, 20);
        $form->addEmail('contact_email', 'Email:')
                ->addRule($form::EMAIL, 'Zadajte platnú emailovú adresu:');
        $form->addText('date', 'Dátum:')
                ->setEmptyValue('DD.MM.RRRR');
        $form->addSelect('symptom', 'Stav:', \App\Presenters\BasePresenter::SYMPTOM_ITEMS)
                ->setDefaultValue('in_progress');
        $form->addTextArea('note', 'Poznámky:', 100, 5);
        if($this->param) {
            $form->setDefaults([
                'number' => $this->param->number,
                'company' => $this->param->company,
                'client' => $this->param->client,
                'contact_tel' => $this->param->contact_phone,
                'contact_email' => $this->param->contact_email,
                'date' => $this->param->date,
                'symptom' => $this->param->symptom,
                'note' => $this->param->note]);
        }

        $form->addSubmit('send', 'Uložiť ponuku');
        $form->onSubmit[] = [$this, 'onFormSucceeded'];
        
        return $form;
    }
    
    private function onFormSucceeded(UI\Form $form) {
        $values = $form->getValues();
        $this->param ? \Tracy\Debugger::barDump($this->param) : FALSE;
        $this->onFormSucces();
    }
    
    public function render() {
        $this->template->render(__DIR__ . '\..\Templates\PriceOffer\addPriceOffer.latte');
        $this->template->id = $this->param;
    }
}

interface IPriceOfferFormFactory
{
    /**
     * @param $param
     * @return PriceOfferForm
     */
    function create($param = null);
}
