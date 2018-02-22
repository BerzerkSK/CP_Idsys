<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app\templates\menu.latte

use Latte\Runtime as LR;

class Templatec6b831950f extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>

<?php
		if ($isLogged) {
			?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PriceOffer:allPriceOffers")) ?>">Zoznam cenových ponúk</a>
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PriceOffer:addPriceOffer")) ?>">Pridať cenovú ponuku</a>
<?php
		}
		else {
			?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:")) ?>">Pomoc</a>
<?php
		}
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
