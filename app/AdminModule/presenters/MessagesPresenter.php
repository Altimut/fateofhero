<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 07.02.2017
 * Time: 17:06
 */

namespace AdminModule;


use Latte\Engine;
use Nette;
use Nette\Application\UI\Form;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;

class MessagesPresenter extends BasePresenter
{
    public function __construct(Nette\Database\Context $database)
    {
        parent::__construct($database);
    }

    public function renderDefault()
    {
        $this->template->messages = $this->database->table('contact');
    }

    public function renderSend($id)
    {
        $post = $this->database->table('contact')->get($id);
        if(!$post)
        {
            $this->flashMessage('Zpráva neexistuje','danger');
            $this->redirect(':Admin:Message:default');
        } else {
            $this->template->data = $post;
        }
    }
    protected function createComponentContactForm()
    {
        $form = new Form();
        $form->addTextArea('messagem','Odpověď')
            ->addRule(Form::FILLED,'Musíte napsat zprávu');
        $form->addSubmit('send','Odeslat');
        $form->onSuccess[] = array($this, 'ContactFormSubmitted');
        return $form;
    }
    public function ContactFormSubmitted(Form $form)
    {
        $values = $form->getValues();
        $id = $this->getParameter('id');
        $data = $this->database->table('contact')->get($id);
        $parrams = [
            'message' => $values->messagem,
            'jmeno'   => $this->user->getIdentity()->fname,
            'prijmeni'   => $this->user->getIdentity()->sname
        ];
        $latte = new Engine();
        $mail = new Message;
        $mail->setFrom('FateOfHero <no-reply@rateofhero.cz>')
            ->addTo($data->email)
            ->setSubject('Registrace na webu FOH')
            ->setHtmlBody($latte->renderToString(__DIR__ . '/../templates/Messages/email.latte', $parrams));
        $mailer = new SendmailMailer;
        $mailer->send($mail);
        $this->database->table('contact')->update([
            'send' => '1']);
        $this->flashMessage('Zpráva byla úspěšně odeslána.','success');
        $this->redirect('Messages:default');
    }
}