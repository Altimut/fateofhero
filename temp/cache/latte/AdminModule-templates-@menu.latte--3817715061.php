<?php
// source: D:\projects\fateofhero\app\AdminModule\templates\@menu.latte

use Latte\Runtime as LR;

class Template3817715061 extends Latte\Runtime\Template
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

<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 2 */ ?>/adminstyle/dist/css/skins/_all-skins.min.css">

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('scripts', get_defined_vars());
?>
<header class="main-header  animated fadeInDown">
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>FOH</b>A</span>
        <span class="logo-lg"><b>FOH</b> Administrace</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
</header>
{}<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 65 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($user->getIdentity()->avatar)) /* line 65 */ ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo LR\Filters::escapeHtmlText($user->getIdentity()->username) /* line 68 */ ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Hlavní menu</li>
            <li class="<?php
		if ($this->global->uiPresenter->isLinkCurrent(":Admin:Homepage:default")) {
			?>active<?php
		}
?> treeview">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Homepage:default")) ?>">
                    <i class="fa fa-dashboard"></i> <span>Domovská stránka</span>
                </a>
            </li>
            <li class="<?php
		if ($this->global->uiPresenter->isLinkCurrent(":Admin:Users:*")) {
			?>active<?php
		}
?> treeview">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Users:default")) ?>">
                    <i class="fa fa-users"></i> <span>Uživatelé</span>
                </a>
            </li>
            <li class="<?php
		if ($this->global->uiPresenter->isLinkCurrent(":Admin:Blog:*")) {
			?>active<?php
		}
?>">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Blog:default")) ?>">
                    <i class="fa fa-newspaper-o"></i> <span>Novinky</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Blog:default")) ?>"><i class="fa fa-newspaper-o"></i> Seznam novinek</a></li>
                    <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Blog:new")) ?>"><i class="fa fa-plus"></i> Napsat novinku</a></li>
                </ul>
            </li>

            <li class="<?php
		if ($this->global->uiPresenter->isLinkCurrent(":Admin:Team:*")) {
			?>active <?php
		}
?>treeview">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Team:default")) ?>">
                    <i class="fa fa-users"></i> <span>Team</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Team:default")) ?>"><i class="fa fa-users"></i> Seznam členů v teamu</a></li>
                    <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Team:new")) ?>"><i class="fa fa-plus"></i> Přidat člena do teamu</a></li>
                </ul>
            </li>
            <li  class="<?php
		if ($this->global->uiPresenter->isLinkCurrent(":Admin:Gallery:*")) {
			?>active<?php
		}
?> treeview">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Gallery:default")) ?>">
                    <i class="fa fa-image"></i> <span>Galerie</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Gallery:default")) ?>"><i class="fa fa-image"></i> Seznam obrázků</a></li>
                    <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Gallery:new")) ?>"><i class="fa fa-plus"></i> Přidat obrázek</a></li>
                </ul>
            </li>
            <li class="<?php
		if ($this->global->uiPresenter->isLinkCurrent(":Admin:Messages:*")) {
			?>active<?php
		}
?>treeview">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Messages:default")) ?>">
                    <i class="fa fa-comments"></i> <span>Zprávy/dotazy z webu</span>
                </a>
            </li>
            <li class="header">Uživatelské menu</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Nastavení účtu</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-sign-out"></i> <span>Odhlásit se</span>
                </a>
                <div class="modal modal-warning" id="myModal" role="dialog">
                    <div class="modal-dialog" style="margin-top: 60px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Opravdu?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Opravdu se chcete odhlásit?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Zavřít</button>
                                <a type="button" class="btn btn-outline" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">Opravdu</a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>



            </li>
            <li class="treeview">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Front:Homepage:default")) ?>">
                    <i class="fa fa-external-link"></i> <span>Zpátky na web</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockScripts($_args)
	{
		extract($_args);
		?>    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 5 */ ?>/adminstyle/plugins/fastclick/fastclick.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 6 */ ?>/adminstyle/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */ ?>/adminstyle/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/adminstyle/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/adminstyle/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */ ?>/adminstyle/plugins/chartjs/Chart.min.js"></script>
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/adminstyle/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 12 */ ?>/adminstyle/dist/js/app.min.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/adminstyle/dist/js/demo.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */ ?>/adminstyle/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 15 */ ?>/js/nette.ajax.js"></script>

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
    <script>
        $(function () {
            setTimeout(function () {
                $(".alert").addClass("slideOutRight");
                setTimeout(function () {
                    $(".row-alert-js").remove();
                }, 1000);
            }, 10000);
            $(".textarea").wysihtml5();
        });
    </script>
<?php
	}

}
