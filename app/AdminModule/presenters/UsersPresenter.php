<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 28.01.2017
 * Time: 0:42
 */

namespace AdminModule;


use Nette;
use Nette\Application\UI\Form;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Latte\Engine;

class UsersPresenter extends BasePresenter
{
    public function __construct(Nette\Database\Context $database)
    {
        parent::__construct($database);
    }
    public function renderDefault()
    {
        $this->template->pexedit = $this->database->table('permissions')->get($this->user->getId())->useredit;
        $this->template->userlist = $this->database->table('users');
        $this->template->requestregs = $this->database->table('requestregister');
    }
    public function renderEdit($id)
    {
        $user = $this->database->table('users')->get($id);
        if(!$user)
        {
            $this->flashMessage('Uživatel neexistuje','danger');
            $this->redirect('Users:default');
        } else {
            if ($this->database->table('permissions')->get($this->user->getId())->useredit === 1) {
                $this->template->data = $this->database->table('users')->where('id = ?', $id)->fetch();
                $this->template->pex = $this->database->table('permissions')->where('users_id = ?', $id)->fetch();
            } else {
                $this->flashMessage('Nemáte oprávnění k úpravě uživatele','danger');
                $this->redirect('Users:default');
            }
        }
    }
    protected function createComponentCreateUserForm()
    {
        $form = new Form();
        $form->addText('email','Vložte email:')
            ->addRule(Form::REQUIRED, 'Toto pole je povinné')
            ->addRule(Form::EMAIL, 'Musí obsahovat @');
        $form->addSubmit('send','Odeslat');
        $form->onSuccess[] = function (Form $form, $values){
            try
            {
                $token =  Nette\Utils\Random::generate(15,'a-z0-9A-Z');
                $email = $values->email;
                $params = [
                    'key' =>  $token
                ];
                $latte = new Engine();
                $mail = new Message;
                $mail->setFrom('FateOfHero <no-reply@rateofhero.cz>')
                    ->addTo($email)
                    ->setSubject('Registrace na webu FOH')
                    ->setHtmlBody($latte->renderToString(__DIR__ . '/../templates/Users/email.latte', $params));
                $mailer = new SendmailMailer;
                $mailer->send($mail);
                $this->database->table('requestregister')->insert(['token' => $token, 'email' => $email]);
                $this->flashMessage('Předregistrace proběhla úspěšně','success');
                $this->redirect('this');
            }catch (Nette\Mail\SmtpException $e){

            }
        };
        return $form;
    }
    public function actionDeletereg($email)
    {
            $this->database->table('requestregister')->where('email = ?', $email)->delete();
            $this->redirect('Users:default');
            $this->flashMessage('Předregistrace byla zrušena','success');
    }
    public function handleDeletereg($email)
    {
        $this->database->table('requestregister')->where('email = ?', $email)->delete();
        $this->redrawControl('prereglist');
        $this->redrawControl('formprereg');
    }
    protected function createComponentUsereditForm()
    {
        $id = $this->getParameter('id');
        $data = $this->database->table('permissions')->where('users_id = ?', $id);
        $endis = [
            '1' =>  'Povolit',
            '0' =>  'Zakázat'
        ];
        $form = new Form();
        $form->addRadioList('login', 'Přihlášení do systému', $endis);
        $form->addRadioList('blog', 'Psaní/úprava Příspěvků na blogu', $endis);
        $form->addRadioList('teamedit', 'Úprava členů teamu', $endis);
        $form->addRadioList('useredit', 'Úprava Uživatelů', $endis);
        $form->setDefaults($data);
        $form->addSubmit('send','Editovat');

        $form->onSuccess[] = function (Form $form, $values)
        {
            $id = $this->getParameter('id');
            $this->database->table('permissions')->where('users_id = ?', $id)->update($values);
        };
        return $form;
    }
}