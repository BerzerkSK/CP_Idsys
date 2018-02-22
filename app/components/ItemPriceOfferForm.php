<?php

namespace App\components;

use Nette\Application\UI;
use App\Model;
use App\components;


/* 
 * Formular na yadavanie poloziek pre Cenovu Ponuku - komponenta
 * 
 * 
 */

class ItemPriceOfferForm extends UI\Control
{
    public $onItemFormSucces;
    private $param = null;
    private $priceOfferManager;
    private $user;

    public function __construct($param = null, Model\PriceOfferManager $priceOfferManager, \Nette\Security\User $user) {
        parent::__construct();
        $this->param = $param;
        $this->priceOfferManager = $priceOfferManager;
        $this->user = $user;
    }
    
    public function createComponentItemPriceOfferForm() {
        $form = new UI\Form;
        $form->addText('text','Text');
        
        $form->addSubmit('submit', 'Odosli');
        $form->onSubmit[] = [$this, 'onFormSucceeded'];
        return $form;
    }
    
    private function onFormSucceeded(UI\Form $form) {
        $values = $form->getValues();
        $this->onItemFormSucces();
    }
    
    public function render() {
        $this->template->render(__DIR__ . '\..\Templates\components\ItemPriceOfferForm.latte');
        $this->template->id = $this->param;
    }
}

interface IItemPriceOfferFormFactory
{
    /**
     * @param $param
     * @return ItemPriceOfferForm
     */
    function create($param = null);
}
