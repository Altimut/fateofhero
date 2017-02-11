<?php
// source: D:\projects\fateofhero\app\AdminModule/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templatebf4b78833b extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_rchat' => 'blockRchat',
		'_rfchat' => 'blockRfchat',
	];

	public $blockTypes = [
		'content' => 'html',
		'_rchat' => 'html',
		'_rfchat' => 'html',
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
		if (isset($this->params['chat'])) trigger_error('Variable $chat overwritten in foreach on line 78');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Domovská stránka
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="small-box bg-aqua animated fadeInUp">
                        <div class="inner">
                            <h3><?php echo LR\Filters::escapeHtmlText($news) /* line 13 */ ?></h3>

                            <p>Novinek</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Blog:default")) ?>">
                            Seznam novinek <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="small-box bg-maroon animated fadeInUp">
                        <div class="inner">
                            <h3><?php echo LR\Filters::escapeHtmlText($users) /* line 28 */ ?></h3>

                            <p>Uživatelů v administraci</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Users:default")) ?>">
                            Seznam uživatelů <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="small-box bg-orange animated fadeInUp">
                        <div class="inner">
                            <h3><?php echo LR\Filters::escapeHtmlText($gallery) /* line 43 */ ?></h3>
                            <p>Obrázků v Galerii</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-image"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Gallery:default")) ?>">
                            Nastavení obrázků v galerii <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="small-box bg-green animated fadeInUp">
                        <div class="inner">
                            <h3><?php echo LR\Filters::escapeHtmlText($team) /* line 57 */ ?></h3>
                            <p>Členů v teamu</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Team:default")) ?>">
                            Seznam členů v teamu <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="box box-success animated fadeInUp">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chat </h3>
                        </div>
                        <div class="box-body">
                            <div class="direct-chat-messages">
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('rchat')) ?>"><?php $this->renderBlock('_rchat', $this->params) ?></div>                            </div>
                        </div>
                        <div class="box-footer" style="display: block;">
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('rfchat')) ?>"><?php $this->renderBlock('_rfchat', $this->params) ?></div>                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="box box-info animated fadeInUp">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <div class="box-body">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
	}


	function blockRchat($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("rchat", "static");
		$iterations = 0;
		foreach ($messages as $chat) {
			if ($chat->user_id === $user->getId()) {
?>
                                            <div class="direct-chat-msg">
<?php
			}
			else {
?>
                                            <div class="direct-chat-msg right">
<?php
			}
?>
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left"><?php echo LR\Filters::escapeHtmlText($chat->ref('users','user_id')->username) /* line 85 */ ?></span>
                                            <span class="direct-chat-timestamp pull-right"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $chat->date, 'G:i:s j.n')) /* line 86 */ ?></span>
                                        </div>
                                        <img class="direct-chat-img" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 88 */ ?>/adminstyle/dist/img/avatar5.png"
                                             alt="message user image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            <?php echo LR\Filters::escapeHtmlText($chat->message) /* line 91 */ ?>

                                        </div>
                                        </div>
<?php
			$iterations++;
		}
		$this->global->snippetDriver->leave();
		
	}


	function blockRfchat($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("rfchat", "static");
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["chatForm"];
		?>                                <form class="ajax" role="form"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		'role' => NULL,
		), FALSE) ?>>
                                    <div class="input-group">
                                        <input type="text" placeholder="Napište zprávu..."
                                               class="form-control"<?php
		$_input = end($this->global->formsStack)["text"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'placeholder' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                                        <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success btn-flat"<?php
		$_input = end($this->global->formsStack)["send"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>Odeslat</button>
                                        </span>
                                    </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>                                </form>
<?php
		$this->global->snippetDriver->leave();
		
	}

}
