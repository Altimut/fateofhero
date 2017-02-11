<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 04.02.2017
 * Time: 13:46
 */

namespace AdminModule;


use Nette;
use Nette\Application\UI\Form;

class TeamPresenter extends BasePresenter
{
    public function __construct(Nette\Database\Context $database)
    {
        parent::__construct($database);
    }

    public function renderDefault()
    {
        $this->template->list = $this->database->table('team');
    }

    public function renderEdit()
    {

    }

    public function renderNew()
    {

    }

    protected function createComponentTeamForm()
    {
        $form = new Form();
        $user = $this->database->table('users')->fetchPairs('id','username');
        $form->addSelect('users_id','Uživatel',$user);
        $form->addText('post','Pozice');
        $form->addUpload('avatar','Avatar:');
        $form->addSubmit('send','Odeslat');
        $form->onSuccess[] = array($this, 'TeamFormSubmit');
        return $form;
    }
    public function TeamFormSubmit(Form $form,$values)
    {
        $file = $values->avatar;
        if($file->isImage() and $file->isOk())
        {
            $file_ext=strtolower(mb_substr($file->getSanitizedName(), strrpos($file->getSanitizedName(), ".")));
            $file_name = uniqid(rand(0,20), TRUE).$file_ext;
            $file->move(__DIR__ . '/../../../www/images/avatar/'. $file_name);
            $this->database->table('team')->insert(array(
                'users_id'  => $values->users_id,
                'avatar'    => $file_name,
                'post'      => $values->post
            ));
            $this->flashMessage('Úspěšně nahraný','success');
        } else {
            $this->flashMessage('Stala se chyba','danger');
        }
        $this->redirect(':Admin:Team:default');
    }
}