<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 03.02.2017
 * Time: 23:21
 */

namespace FrontModule;

use Nette;

class BlogPresenter extends BasePresenter
{
    protected $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }
    public function renderDefault()
    {

    }
    public function renderPost($id)
    {
        $db = $this->database->table('blog');
        if(!$db->get($id))
        {
            $this->redirect(':Homepage:default');
        }
        $this->template->data = $db->fetch();
    }
}