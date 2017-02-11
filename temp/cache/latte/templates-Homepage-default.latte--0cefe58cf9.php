<?php
// source: D:\projects\fateofhero\app\FrontModule/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template0cefe58cf9 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_contact' => 'blockContact',
	];

	public $blockTypes = [
		'content' => 'html',
		'_contact' => 'html',
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
		if (isset($this->params['team'])) trigger_error('Variable $team overwritten in foreach on line 79');
		if (isset($this->params['new'])) trigger_error('Variable $new overwritten in foreach on line 98');
		if (isset($this->params['gallery'])) trigger_error('Variable $gallery overwritten in foreach on line 118');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div class="section " id="section0">
        <div class="content" style="top: 10%;">
            <img style="height: auto; width: auto" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 4 */ ?>/images/logo.png">
            <h2 style="margin-top:20px; color:#fff; font-size: 60px;"><span
                        style="border-bottom-style: solid; border-bottom-color: #fff; border-top-style: solid; border-top-color: #fff;">Nová česká RPG hra.</span>
            </h2>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="row" style="margin-top: 20px;">
            <div class="col l5 m9 s12">
                <h2>O Hře</h2>
                <p class="black">Hra Fate of Hero je založená na legendě o mladém hrdinovi, kterou vypráví dědeček svým
                    vnoučatům před
                    spaním. Hra se chystá s kompletní českou lokalizací a dabingem. Samotný příběh je založen na
                    skutečné události převedené do našeho fantasy světa s pohádkovým nádechem.</p>
                <p class="black">Prvních několik místností, které navštívíte, slouží jako náhrada za nudný tutoriál.
                    Cílem je osvojení
                    ovládání a schopnost využít vše, co okolní svět nabízí. Již teď vám můžeme slíbit Open World, který
                    bude obsahovat velké množství vedlejších misí a skrytých místností. Dále řadu chytlavých miniher a
                    hádanek, co vám občas zaberou déle času, než byste možná čekali. Za každý dokončený úkol vás bude
                    čekat odměna v podobě surovin, platidla, nebo zbraní proti zvířatům, příšerám a všemožným
                    nepřátelským stvořením.</p>
                <p class="black">Hlavní dominantou hry je příběh na princip vtipné pohádky, ve které si své najde každý,
                    a to v
                    jakémkoliv věku!</p>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="row" style="margin-top: 20px;">
            <div class="col l5 m10 s12 offset-l6 offset-m1">
                <h2>Příběh</h2>
                <p class="white">Příběh se odehrává v krutém středověku, kde mocný čaroděj dychtí po věčném životě. Jeho
                    snažení se upíná
                    k vytvoření nesmrtelného elixíru. <br>
                    Nejprve kouzelník stvořil jen několik bytostí, které mu měli posloužit k obstarání
                    potřebných
                    ingrediencí, ať už se jednalo o chlup, krev, moč nebo dokonce část orgánu.<br>
                    Kouzelník byl už velice starý, a proto ho po úspěšném dokončení svého díla samou
                    radostí ranila mrtvice a
                    zemřel i se svým tajemstvím ukrytý kdesi v podzemí.<br>
                    O pár let později, v nedaleké vesnici, žil mladý chlapec, jehož otec skonal v boji s
                    krvelačnými
                    skřítky.<br>
                    Jeho matku, stejně jako většinu bezmocných žen ze vsi, sužuje táhlá a smrtelná
                    nemoc.<br>
                    Mladý Leonard jednoho dne na tržnici zaslechne legendu o bájném lektvaru, který léčí
                    všechny nemoci.<br>
                    Bez váhání se vydá na cestu i přesto, že vůbec netuší kde začít.<br>
                    Jakmile však přijde k hranicím temného lesa, zem se otřese a on se propadne do
                    země.<br>
                    Od tohoto okamžiku se Leonardovým cílem stává pouze přežít.</p>
            </div>
        </div>
    </div>
    <div class="section" id="section3">
        <div class="row" style="margin-top: 20px;">

            <div class="col l5 m9 s12 offset-l6">
                <h2>O studiu</h2>
                <p  class="black">KedarSoft Studio je nezávislé herní studio založené v roce 2010, které se specializuje
                    na tvorbu her
                    v
                    GameMaker Studio.<br>
                    Tým je složen z kreativních a nadšených lidí z Čech i Slovenska, kteří jsou připraveni na jakoukoli
                    šílenost.<br>
                    Našemu studiu je v současné době připisována jen hrstka malých projektů pro několik firem.<br>
                    Studio v této podobě vznikalo řadu let a do současné podoby se dostalo až začátkem roku 2015.</p>
                <div style="text-align: center;"><img style="height: 250px; width: auto;" src="/images/LogoKS-studio.png"></div>
            </div>
        </div>
    </div>
    <div class="section" id="section4">
        <div class="intro">
            <h2>Tým</h2>
            <div class="row">
<?php
		$iterations = 0;
		foreach ($teams as $team) {
?>
                    <div class="col l2 m4 s12">
                        <div class="hovereffect">
                            <img style="width: 100%;" class="img-responsive"
                                 src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 83 */ ?>/images/avatar/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($team->avatar)) /* line 83 */ ?>" alt="">
                            <div class="overlay"><br>
                                <h3><?php echo LR\Filters::escapeHtmlText($team->ref('users','users_id')->fname) /* line 85 */ ?> <?php
			echo LR\Filters::escapeHtmlText($team->ref('users','users_id')->sname) /* line 85 */ ?></h3><br>
                                Pozice: <?php echo LR\Filters::escapeHtmlText($team->post) /* line 86 */ ?>

                            </div>
                        </div>
                    </div>
<?php
			$iterations++;
		}
?>
            </div>
        </div>
    </div>
    <div class="section" id="section5">
        <div class="intro">
            <h2>Novinky</h2>
            <div class="row" style="margin-right: 15px;margin-left: 15px;">
<?php
		$iterations = 0;
		foreach ($news as $new) {
?>
                    <div class="col l3 s12 m3">
                        <div class="card grey lighten-2">
                            <div style="color: #2e2e2e; font-size: 16px;" class="card-content black-text" >
                                <span class="card-title"><?php echo LR\Filters::escapeHtmlText($new->title) /* line 102 */ ?></span>
                                <small  style="font-size: 13px; " class="darken-3"><p>Datum: <span class="deep-orange-text darken-3"><?php
			echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $new->date, 'd.m.Y')) /* line 103 */ ?></span> Autor: <?php
			echo LR\Filters::escapeHtmlText($new->ref('users','autor')->username) /* line 103 */ ?></a></p></small>

                            </div>
                            <div class="card-action">
                                <a class="deep-orange-text darken-3" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Blog:post", [$new->id])) ?>">Detail</a>
                            </div>
                        </div>
                    </div>
<?php
			$iterations++;
		}
?>
            </div>
        </div>
    </div>
    <div class="section" id="section6">
        <div style="margin-left: 20px; margin-right: 20px;">
            <h2>Galerie</h2>
<?php
		$iterations = 0;
		foreach ($gallerys as $gallery) {
			?>                <a class="fancybox-thumbs" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 119 */ ?>/images/gallery/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($gallery->image)) /* line 119 */ ?>"
                   data-fancybox-group="gallery" title="<?php echo LR\Filters::escapeHtmlAttr($gallery->title) /* line 120 */ ?>"><img
                            style="max-height: 100px; max-width: 100px;"
                            src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 122 */ ?>/images/gallery/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($gallery->image)) /* line 122 */ ?>" alt=""></a>
<?php
			$iterations++;
		}
?>
        </div>
    </div>
    <div class="section" id="section7">
        <div class="intro">
            <h2>Kontakt</h2>
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('contact')) ?>"><?php $this->renderBlock('_contact', $this->params) ?></div>        </div>
    </div>
<?php
	}


	function blockContact($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("contact", "static");
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["contactForm"];
		?>                <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), FALSE) ?>>
                    <table style="text-align: center; margin-left: auto; margin-right: auto;">
                        <tr><td><input type="email" placeholder="Vložte email."<?php
		$_input = end($this->global->formsStack)["email"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>></td></tr>
                        <tr><td><textarea rows="3" placeholder="Vložte zprávu"<?php
		$_input = end($this->global->formsStack)["message"];
		echo $_input->getControlPart()->addAttributes(array (
		'rows' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></textarea></td></tr>
                        <tr><td><input type="checkbox"<?php
		$_input = end($this->global->formsStack)["checkbox"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>> Antispam</td></tr>
                        <tr><td><input type="submit" value="Odeslat"<?php
		$_input = end($this->global->formsStack)["send"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>></td> </tr>
                    </table>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>                </form>
<?php
		$this->global->snippetDriver->leave();
		
	}

}
