<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app\presenters/templates/Users/showall.latte

use Latte\Runtime as LR;

class Template5abd7a0331 extends Latte\Runtime\Template
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
		if ($IsLogin && in_array($user->role, array($ADMIN, $KONATEL, $RIADITEL))) {
			?>        <a class="btn btn-primary btn-sm active" role="button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Users:addUser")) ?>">Pridaj užívateľa</a>
<?php
		}
		
	}

}
