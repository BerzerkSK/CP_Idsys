<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app/templates/PriceOffer/default.latte

use Latte\Runtime as LR;

class Templatef2be95eb59 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
?>    <p>PriceOffer_default</P>
<?php
	}

}
