<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app/templates/PriceOffer/allPriceOffers.latte

use Latte\Runtime as LR;

class Templateed182c1c57 extends Latte\Runtime\Template
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
		if (isset($this->params['priceOffer'])) trigger_error('Variable $priceOffer overwritten in foreach on line 10');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div>
        <table class="table table-striped">
            <th>Číslo</th>
            <th>Dátum</th>
            <th>Firma</th>
            <th>Klient</th>
            <th>Stav</th>
            <th></th>
<?php
		$iterations = 0;
		foreach ($priceOffers as $priceOffer) {
?>            <tr>
                <td><?php echo LR\Filters::escapeHtmlText($priceOffer->number) /* line 11 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $priceOffer->date, '%d.%m.%Y')) /* line 12 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($priceOffer->company) /* line 13 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($priceOffer->client) /* line 14 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($symptom[$priceOffer->symptom]) /* line 15 */ ?></td>
                <td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PriceOffer:addPriceOffer", [$priceOffer->id])) ?>">Upravit</a>/<a href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PriceOffer:deletePriceOffer", [$priceOffer->id])) ?>">Zmazat</a></td>
            </tr>
<?php
			$iterations++;
		}
?>
        </table>
    </div>
<?php
	}

}
