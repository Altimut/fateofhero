<?php
// source: D:\projects\fateofhero\app\FrontModule\templates\@menu.latte

use Latte\Runtime as LR;

class Template86e977ae90 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div id="header">
    <nav>
        <ul id="menu">
            <li data-menuanchor="o-hre"><a href="#o-hre">O hře</a></li>
            <li data-menuanchor="pribeh"><a href="#pribeh">Příběh</a></li>
            <li data-menuanchor="studio"><a href="#studio">Studio</a></li>
            <li data-menuanchor="tym"><a href="#tym">Tým</a></li>
            <li data-menuanchor="novinky"><a href="#novinky">Novinky</a></li>
            <li data-menuanchor="galerie"><a href="#galerie">Galerie</a></li>
            <li data-menuanchor="kontakt"><a href="#kontakt">Kontakt</a></li>
        </ul>
        <ul class="right-soc">
            <li><a href="https://www.facebook.com/FateofHero/" target="_blank"><img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/images/facebook.png"></a></li>
            <li><a href="https://www.youtube.com/channel/UCj_ONWiwzKURq9FGbLa0U2w" target="_blank"><img src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */ ?>/images/yt.png"></a></li>
        </ul>
    </nav>
</div>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
