<?php

namespace App\Model;

use Nette;
use App\Model\BaseModel;
use Nette\Database\Context;
use Nette\Security\User;
use Nette\Database\Table\ActiveRow;

/* 
 * funkcie pre PriceOffer DB - nacitanie udajov
 */

class PriceOfferManager
{
    const
            TABLE_NAME_PRICE = 'priceoffer',
            TABLE_NAME_USERS = 'users',
            COLUMN_ID = 'id',
            COLUMN_NUMBER = 'number';
    
    /** @var Context */
    public $database;
    
    /** @var \Nette\Security\User */
    public $user;

    public function __construct(Context $database, \Nette\Security\User $user) {
        $this->database = $database;
        $this->user = $user;
    }
    
    public function getAllPriceOffer() {
        return $this->database->table(self::TABLE_NAME_PRICE)->order(self::COLUMN_NUMBER)->fetchAll();
    }
    
    public function getOnePriceOffer($id) {
        /* vrati objekt entity */
        return $this->database->table(self::TABLE_NAME_PRICE)->where(self::COLUMN_ID, intval($id))->fetch();
    }
}