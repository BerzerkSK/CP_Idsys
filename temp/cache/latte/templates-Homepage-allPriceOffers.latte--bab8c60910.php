<?php
// source: D:\Programy\xampp\htdocs\CP_Idsys\app/templates/Homepage/allPriceOffers.latte

use Latte\Runtime as LR;

class Templatebab8c60910 extends Latte\Runtime\Template
{
	public $blocks = [
		'content2' => 'blockContent2',
		'menu' => 'blockMenu',
		'content' => 'blockContent',
		'scripts' => 'blockScripts',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content2' => 'html',
		'menu' => 'html',
		'content' => 'html',
		'scripts' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content2', get_defined_vars());
?>


<?php
		$this->renderBlock('menu', get_defined_vars());
?>


<?php
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
?>



<?php
		$this->renderBlock('head', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent2($_args)
	{
		
	}


	function blockMenu($_args)
	{
		
	}


	function blockContent($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
		$this->renderBlockParent('scripts', get_defined_vars());
?>
<script src="https://files.nette.org/sandbox/jush.js"></script>
<script>
	jush.create_links = false;
	jush.highlight_tag('code');
	$('code.jush').each(function(){ $(this).html($(this).html().replace(/\x7B[/$\w].*?\}/g, '<span class="jush-latte">$&</span>')) });

	$('a[href^="#"]').click(function(){
		$('html,body').animate({ scrollTop: $($(this).attr('href')).show().offset().top - 5 }, 'fast');
		return false;
	});
</script>
<?php
	}


	function blockHead($_args)
	{
		
	}

}
