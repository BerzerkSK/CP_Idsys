<?php
namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Utils\Strings;
use Nette\Application\UI\Form;
use App\components;


/**
 * Base presenter for all application presenters.
 */
/*
    poznamky
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    const SYMPTOM_ITEMS = ['in_progress' => 'rozpracovaná',
                            'processed' => 'spracovaná',
                            'on_price' => 'naceniť',
                            'realized' => 'zrealizovaná',
                            'unrealized' => 'nezrealizovaná'];
    
    const ROLE = ['admin', 'manager', 'sales', 'buyer', 'other'];
    const ROLE_NAME = ['admin' => 'Administrátor',
                       'manager' => 'Konateľ',
                       'sales' => 'Obchodný zástupca',
                       'buyer' => 'Nákupca',
                       'other' => 'Ostatné'];


    /** @var  Model\PriceOfferManager @inject */
    public $priceOfferManager;
    
    /** @var \App\Model\CredentialsAuthenticator @inject */
    public $credentialsAuthenticator;
    
    /** @var components\IPriceOfferFormFactory @inject */
    public $priceOfferFormFactory;
    
    /** @var components\IItemPriceOfferFormFactory @inject */
    public $itemPriceOfferFormFactory;
    
    /** @var Nette\Http\Session @inject */
    public $session;
    
    public $section;

    public function startup() {
        parent::startup();
        $this->loginTest();
        $this->template->symptom = self::SYMPTOM_ITEMS;
        $this->template->role = self::ROLE;
        if($this->user->loggedIn) {
            $this->section = $this->session->getSection('idsys');
            $this->getCourse();
        }
    }
    
    public function loginTest($roles = null) {
        $roles_backup = $roles;
        if (!($roles == NULL)) {
            $roles = explode(',', $roles);
        }
        else {
            $roles = self::ROLE;
        }

        if($this->user->loggedIn && in_array($this->user->identity->role, $roles)) {
            $test = TRUE;
        }
        else {
            $test = FALSE;
        }
        $this->template->isLogged = $this->user->loggedIn;
        return $test;
    }
    
    public function getCourse() {
        if(!(isset($this->section->date) && $this->section->date == date('d.m.Y', time()))) {
            $this->section->date = date("d.m.Y", time());
            // ziskanie kurzov z webu www.kb.cz
            $data = explode('.', $this->section->date);
            list($day, $month, $year) = $data;
            $url = 'https://www.kb.cz/kurzovni-listek/cs/rl/index.x?filterDate='.$day.'.+'.$month.'.+'.$year.'&webRateListId=13341&_sourcePage=XStjFvW1vXfTy1H0qb6VVbr2S1adMAdK&__fp=JNPlIcWduRk%3D';
            $homepage = file_get_contents($url);

            $from1 = strpos($homepage, "EUR");
            $from2 = strpos($homepage, "KB - Střed", $from1);
            $this->section->eur = floatval(str_replace(",",".",substr($homepage, $from2+13, 7)));
            $from1 = strpos($homepage, "USD");
            $from2 = strpos($homepage, "KB - Střed", $from1);
            $this->section->usd = floatval(str_replace(",",".",substr($homepage, $from2+13, 7)));
        }
    }


    public function createComponentLoginForm() {
        $form = new Form;
        
        $form->addText('user', 'Užívateľ:')->setRequired('Povinné pole.');
        $form->addPassword('password', 'Heslo:')->setRequired('Povinné pole.');
        
        $form->addSubmit('send', 'Prihlásiť');
        $form->onSubmit[] = [$this, 'processForm'];
        return $form;
    }
    
    public function processForm(Form $form) {
        $values = $form->getValues();

        $this->credentialsAuthenticator->login($values->user, $values->password);
        $this->template->isLogged = $this->user->loggedIn;
        if (!$this->user->loggedIn) {
            $this->flashMessage('Neplatný užívateľ alebo heslo.');
        }
    }
    
}