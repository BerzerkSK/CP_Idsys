<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app\components\..\Templates\components\PriceOfferForm.latte

use Latte\Runtime as LR;

class Template72ad8f68e3 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'content2' => 'blockContent2',
	];

	public $blockTypes = [
		'content' => 'html',
		'content2' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('content2', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		
	}


	function blockContent2($_args)
	{
		extract($_args);
		/* line 6 */ $_tmp = $this->global->uiControl->getComponent("priceOfferForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
	}

}
