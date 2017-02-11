<?php
// source: D:\projects\fateofhero\app\FrontModule/templates/@layout.latte

use Latte\Runtime as LR;

class Templatebf64a337df extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>FateOfHero </title>
	<link rel="stylesheet" type="text/css" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */ ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/css/grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/css/jquery.fullPage.css">
	<link rel="stylesheet" type="text/css" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */ ?>/css/jquery.fancybox.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */ ?>/js/scrolloverflow.js"></script>
	<script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 15 */ ?>/js/jquery.fullPage.js"></script>
	<script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 16 */ ?>/js/jquery.fancybox.pack.js?v=2.1.5"></script>
	<script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */ ?>/js/nette.ajax.js"></script>

	<script type="text/javascript">
        $(function () {
            $.nette.init();
        });
        $("a.ajax").live("click", function (event) {
            event.preventDefault();
            $.get(this.href);
        });

		/* AJAXové odeslání formulářů */
        $("form.ajax").live("submit", function () {
            $(this).ajaxSubmit();
            return false;
        });

        $("form.ajax :submit").live("click", function () {
            $(this).ajaxSubmit();
            return false;
        });
	</script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#fullpage').fullpage({
                anchors: ['up', 'o-hre', 'pribeh', 'studio', 'tym', 'novinky', 'galerie','kontakt'],
                navigation: true,
                scrollOverflow: true,
                navigationPosition: 'right',
                navigationTooltips: ['Nahoru', 'O hře', 'Příběh hry', 'Studio', 'Tým', 'Novinky', 'Galerie', 'Kontakt']
            });

        });
        $(document).ready(function() {
            $('.fancybox').fancybox();
        });</script>
	<script type="text/javascript">
        $('.fancybox-thumbs').fancybox({
            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : true,
            arrows    : true,
            nextClick : true,

            helpers : {
                thumbs : {
                    width  : 50,
                    height : 50
                }
            }
        });


	</script>

</head>
<body>


<?php
		/* line 77 */
		$this->createTemplate('@menu.latte', $this->params, "include")->renderToContentType('html');
?>
<div id="fullpage">
<?php
		$this->renderBlock('content', $this->params, 'html');
?>
</div>


</body>
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
