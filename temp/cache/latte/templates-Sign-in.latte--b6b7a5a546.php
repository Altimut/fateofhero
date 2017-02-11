<?php
// source: D:\projects\fateofhero\app\AdminModule/templates/Sign/in.latte

use Latte\Runtime as LR;

class Templateb6b7a5a546 extends Latte\Runtime\Template
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 11');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div class="login-box">
        <div class="login-logo animated fadeInUp">
            <a href="#"><b>Administrace</b> FOH.cz</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="red login-box-msg animated fadeInDown">Musíte se přihlásit pro přístup.</p>
<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["signInForm"];
		?>            <form method="post"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'method' => NULL,
		), FALSE) ?>>
                <?php
		if ($form->hasErrors()) {
?>

<?php
			$iterations = 0;
			foreach ($form->errors as $flash) {
				?>                        <div class="login-box-msg text-red animated flash"><?php echo LR\Filters::escapeHtmlText($flash) /* line 12 */ ?></div>
<?php
				$iterations++;
			}
		}
?>
                <div class="form-group has-feedback animated fadeInUp">
                    <input type="text" class="form-control" placeholder="Uživatelské jméno"<?php
		$_input = end($this->global->formsStack)["username"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
                    <span class="glyphicon glyphicon-user form-control-feedback"<?php
		$_input = end($this->global->formsStack)["username"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></span>
                </div>
                <div class="form-group has-feedback animated fadeInUp">
                    <input type="password" class="form-control" placeholder="Heslo"<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
                    <span class="glyphicon glyphicon-lock form-control-feedback"<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck animated fadeInLeft">
                            <label>
                                <input type="checkbox"<?php
		$_input = end($this->global->formsStack)["time"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>> Zůstat přilášený delší dobu
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4 animated fadeInRight">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"<?php
		$_input = end($this->global->formsStack)["send"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>Přihlásit se</button>
                    </div>
                </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>            </form>
            <a class="animated bounceIn" href="#">Zapoměl jsem heslo</a><br>

        </div>
        <!-- /.login-box-body -->
    </div>
<?php
	}

}
