<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app/templates/PriceOffer/addPriceOffer.latte

use Latte\Runtime as LR;

class Template3b6aca2270 extends Latte\Runtime\Template
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
		extract($_args);
		/* line 2 */
		$this->createTemplate('..\components\priceOfferForm.latte', $this->params, "include")->renderToContentType('html');
		if (isset($id)) {
			if ($id>0) {
				?>            <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("ItemPriceOffer:addItem")) ?>">Pridaj položku cenovej ponuky</a>
<?php
			}
		}
		
	}

}
