<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app\templates\components\priceOfferForm.latte

use Latte\Runtime as LR;

class Template9682b5454d extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		/* line 1 */ $_tmp = $this->global->uiControl->getComponent("priceOfferForm");
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
