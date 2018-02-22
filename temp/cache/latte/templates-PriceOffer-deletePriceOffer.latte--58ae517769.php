<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app/templates/PriceOffer/deletePriceOffer.latte

use Latte\Runtime as LR;

class Template58ae517769 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
