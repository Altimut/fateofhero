<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 27.01.2017
 * Time: 8:29
 */

namespace AdminModule;

use Nette\Application\UI\Form;
use Nette\Utils;

class HomepagePresenter extends BasePresenter
{
    public function renderDefault()
    {
        $this->template->news = $this->database->table('blog')->count();
        $this->template->users = $this->database->table('users')->count();
        $this->template->gallery = $this->database->table('gallery')->count();
        $this->template->team = $this->database->table('team')->count();
        $this->template->messages = $this->database->table('chat')->order('date DESC')->fetchAll();
    }

    public function handleRchat()
    {
        $messages = $this->database->table('chat')->order('date DESC')->fetchAll();
        if ($this->isAjax()) {
            $this->template->messages = $messages;
            $this->redrawControl('rchat');
        } else {
            $this->redirect('this');
        }
    }

    protected function createComponentChatForm()
    {
        $form = new Form();
        $form->getElementPrototype()->class('ajax');
        $form->addText('text', 'Zpráva')
            ->addRule(\Nette\Forms\Form::FILLED, 'pole musí být vyplněné');
        $form->addSubmit('send', 'Odeslat');
        $form->onSuccess[] = [$this, 'chatFormSubmitt'];

        return $form;
    }

    public function chatFormSubmitt(Form $form)
    {
        $values = $form->getValues();
        $user = $this->user->getId();
        $this->database->table('chat')->insert(array(
            'user_id' => $user,
            'date' => new Utils\DateTime(),
            'message' => $values->text
        ));
        if ($this->isAjax()) {
            $this->template->messages = $this->database->table('chat')->order('date DESC')->fetchAll();
            $this->redrawControl('rchat');
            $this->redrawControl('rfchat');
            $form->setValues([], TRUE);
        } else {
            $this->redirect('this');
        }
    }

    public function handleChatUpdate()
    {
        if ($this->isAjax()) {
            $this->template->messages = $this->database->table('chat')->order('date DESC')->fetchAll();
            $this->redrawControl('rchat');
        } else {
            $this->redirect('this');
        }
    }
}