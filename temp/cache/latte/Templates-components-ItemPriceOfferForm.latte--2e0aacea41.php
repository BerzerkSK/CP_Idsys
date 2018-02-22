<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app\components\..\Templates\components\ItemPriceOfferForm.latte

use Latte\Runtime as LR;

class Template2e0aacea41 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		/* line 1 */ $_tmp = $this->global->uiControl->getComponent("itemPriceOfferForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
