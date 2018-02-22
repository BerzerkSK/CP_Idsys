<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app\components\..\Templates\Homepage\addPriceOffer.latte

use Latte\Runtime as LR;

class Templateea4c47a7d7 extends Latte\Runtime\Template
{
	public $blocks = [
		'menu' => 'blockMenu',
		'content2' => 'blockContent2',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'menu' => 'html',
		'content2' => 'html',
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('menu', get_defined_vars());
?>


<?php
		$this->renderBlock('content2', get_defined_vars());
?>

<?php
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockMenu($_args)
	{
		
	}


	function blockContent2($_args)
	{
		
	}


	function blockContent($_args)
	{
		extract($_args);
		/* line 10 */
		$this->createTemplate('..\components\priceOfferForm.latte', $this->params, "include")->renderToContentType('html');
		
	}

}
