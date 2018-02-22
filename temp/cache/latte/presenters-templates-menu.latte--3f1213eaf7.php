<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app\presenters\templates\menu.latte

use Latte\Runtime as LR;

class Template3f1213eaf7 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div id="menu">
            
<?php
		if ($IsLogin) {
			?>    <a class="btn btn-primary btn-sm active" role="button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:")) ?>">Prehľad ponúk</a>
<?php
		}
?>

<?php
		if ($IsLogin && in_array($user->role, array($ADMIN, $KONATEL, $RIADITEL, $OBCHOD))) {
			?>    <a class="btn btn-primary btn-sm active" role="button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("PriceOffer:")) ?>">Nová ponuka</a>
<?php
		}
?>


    
<?php
		if (!$IsLogin) {
?>    <span style='float: right'>
        <a class="btn btn-primary btn-sm active" role="button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Prihlásiť</a></span><?php
		}
?>
</span>
    </span>
    
<?php
		if ($IsLogin) {
?>    <span style='float: right'>
        <span style='align: right;'>Prihlásený: <?php echo LR\Filters::escapeHtmlText($user->name) /* line 14 */ ?> <span><a class="btn btn-primary btn-sm active" role="button" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">Odhlásiť</a></span></span>
    </span>
<?php
		}
?>
                
</div><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
