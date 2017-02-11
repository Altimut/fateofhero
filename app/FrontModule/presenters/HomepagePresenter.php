<?php

namespace FrontModule;

use Nette;
use App\Model;
use Nette\Application\UI\Form;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;

class HomepagePresenter extends BasePresenter
{

    protected $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }
	public function renderDefault()
	{
		$this->template->gallerys = $this->database->table('gallery');
		$this->template->news = $this->database->table('blog');
		$this->template->teams = $this->database->table('team');
	}
    protected function createComponentContactForm()
    {
        $form = new Form();
        $form->addText('email','Vložte váš email:')
            ->addRule(Form::FILLED,'Musíte vyplnit email')
            ->addRule(Form::EMAIL, 'Musí to být platný email');
        $form->addTextArea('message','Vložte vaši zprávu')
            ->addRule(Form::FILLED,'Musíte napsat zprávu');
        $form->addCheckbox('checkbox','Souhlas s odeslanim.')
            ->addRule(Form::FILLED,'Musíte souhlasit');
        $form->addSubmit('send','Odeslat');
        $form->onSuccess[] = array($this, 'ContactSubmitted');
        return $form;
    }
    public function ContactSubmitted(Form $form, $values)
    {

        $parms = [
            'email' => $values->email,
            'zprava' => $values->message
        ];
        $mail2 = new Message;
        $latte2 = new \Latte\Engine;
        $mail2->setFrom('FateofHero - Neodpovídat!! | fateofhero.cz <no-reply@fateofhero.cz>')
            ->addTo($values->email)
            ->setSubject('Dotaz z webu Fate of Hero.')
            ->setHtmlBody($latte2->renderToString(__DIR__ . '/../templates/Homepage/email.latte', $parms));


        $mailer = new SendmailMailer;
        $mailer->send($mail2);

        $this->database->table('contact')->insert(array(
            'email'     => $values->email,
            'message'   => $values->message,
            'date'      => new Nette\Utils\DateTime()
        ));
        $this->redirect('this');
    }
}
