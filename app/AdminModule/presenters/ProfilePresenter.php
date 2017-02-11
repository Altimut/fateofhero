<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 27.01.2017
 * Time: 19:05
 */

namespace AdminModule;


use Nette;

class ProfilePresenter extends BasePresenter
{
    public function __construct(Nette\Database\Context $database)
    {
        parent::__construct($database);
    }

    public function renderDefalt()
    {
    }
    public function renderEdit()
    {

    }
}