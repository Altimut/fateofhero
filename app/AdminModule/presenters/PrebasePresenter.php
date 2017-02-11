<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 27.01.2017
 * Time: 14:46
 */

namespace AdminModule;


use Nette;

abstract class PrebasePresenter extends Nette\Application\UI\Presenter
{
    protected $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }
}