<?php
// source: D:\projects\fateofhero\app\AdminModule/templates/@layout.latte

use Latte\Runtime as LR;

class Template6b217fbde0 extends Latte\Runtime\Template
{
	public $blocks = [
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns:n="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="autor" content="Altisek.eu">
    <title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striptags', $_fi, $s));
			});
			?> | <?php
		}
?>FateOfHero Administrace</title>
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/adminstyle/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/adminstyle/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 12 */ ?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/adminstyle/plugins/iCheck/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('scripts', get_defined_vars());
?>
</head>
<?php
		if ($this->global->uiPresenter->isLinkCurrent('Sign:*')) {
			?><body class="hold-transition login-page"><?php
		}
		else {
			?><body class="sidebar-mini skin-blue animated" style="background-color: #ecf0f5"><?php
			/* line 50 */
			$this->createTemplate('@menu.latte', $this->params, "include")->renderToContentType('html');
		}
?>



<?php
		if (count($flashes)>0) {
?>
    <div class="row row-alert-js" style="margin-top: 5px; margin-right: 5px; height: 0; z-index= 10;">
<?php
			$iterations = 0;
			foreach ($flashes as $flash) {
				?>            <div class="alert alert-<?php echo LR\Filters::escapeHtmlAttr($flash->type) /* line 56 */ ?> alert-dismissable animated slideInRight col-md-4 col-sm-4 col-lg-3 col-lg-offset-9 col-xs-12 col-sm-offset-9 col-md-offset-9" style="position: fixed;z-index: 20;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php
				if ($flash->type === 'danger') {
?>Chyba
                        <?php
				}
				elseif ($flash->type === 'success') {
?>Úspěch
                        <?php
				}
				elseif ($flash->type === 'warning') {
?>Varovávní
                        <?php
				}
				else {
					?>Info<?php
				}
?>!
                </strong> <?php echo LR\Filters::escapeHtmlText($flash->message) /* line 62 */ ?>

            </div>
<?php
				$iterations++;
			}
?>
    </div>
<?php
		}
?>


<?php
		$this->renderBlock('content', $this->params, 'html');
?>

<?php
		if ($this->global->uiPresenter->isLinkCurrent('Sign:*')) {
		}
		else {
?>

<?php
		}
?>
</body>
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 55');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockScripts($_args)
	{
		extract($_args);
		?>    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */ ?>/adminstyle/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 20 */ ?>/adminstyle/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 21 */ ?>/adminstyle/plugins/iCheck/icheck.js"></script>

    <script>
        setTimeout(function () {
            $(".alert").addClass("slideOutRight");
            setTimeout(function () {
                $(".row-alert-js").remove();
            }, 1000);
        }, 10000);
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
            $('input.icheck-red').iCheck({
                checkboxClass: 'icheckbox_square-red',
                radioClass: 'iradio_square-red',
                increaseArea: '20%' // optional
            });
            $('input.icheck-green').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                increaseArea: '20%' // optional
            });
        });
    </script>
<?php
	}

}
