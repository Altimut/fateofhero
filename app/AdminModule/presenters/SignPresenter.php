<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 27.01.2017
 * Time: 11:29
 */

namespace AdminModule;

use App\Model\UserManager;
use Nette;
use Nette\Application\UI\Form;
use Nette\Security\Passwords;
use Nette\Security\User;

class SignPresenter extends PrebasePresenter
{
    /** @var  User */
    private $user;

    /** @var  UserManager */
    protected $userManager;

    public function __construct(Nette\Database\Context $database, UserManager $userManager, User $user)
    {
        parent::__construct($database);
        $this->userManager = $userManager;
        $this->user = $user;
    }

    public function renderIn()
    {

    }
    public function renderPassword()
    {
        $password = 'xx';
        echo Passwords::hash($password);
    }
    public function renderFinalregister($token)
    {
        $post = $this->database->table('requestregister')->where('token = ?',$token)->fetch();
        if (!$post) {
            $this->flashMessage('Token neexistuje', 'danger');
            $this->redirect(':Admin:Homepage:default');
        } else {
            $this['signFinalregisterForm']->setDefaults(array('token' => $token));
        }
    }
    public function actionOut()
    {
        if($this->user->isLoggedIn())
        {
            $this->user->logout();
        }else{

        }
        $this->flashMessage('Úspěšně Odhlášený','success');
        $this->redirect(':Admin:Sign:in');

    }

    protected function createComponentSignFinalregisterForm()
    {
        $form = new Form();
        $form->addText('username','Přezdívka')
                ->addRule(Form::FILLED, 'Toto pole je povinné');
        $form->addText('email','Email:')
            ->addRule(Form::FILLED, 'Toto pole je povinné')
            ->addRule(Form::EMAIL, 'Neplatná Emailová adresa musí obsahovat @')
            ->addRule(Form::EQUAL, 'Emaily se neshodují', $form['email']);
        $form->addText('fname','Křestní jméno');
        $form->addText('sname','Příjmení');
        $form->addPassword('password','Heslo:')
            ->addRule(Form::FILLED,'Musíte vyplnit heslo')
            ->addRule(Form::MIN_LENGTH,'Heslo musí být min. %d znaků',8)
            ->addRule(Form::PATTERN, 'Heslo musí obsahovat aspoň jednu číslici', '.*[0-9].*');
        $form->addPassword('password2','Heslo znova')
            ->addRule(Form::FILLED, 'Toto pole je povinné')
            ->addRule(Form::EQUAL, 'Hesla se musí shodovat', $form['password']);
        $form->addSubmit('send','Registrovat');
        $form->onSuccess[] = array($this, 'FinalSubmited');
        return $form;
    }
    public function FinalSubmited(Form $form)
    {
        $values = $form->getValues();
        $token = $this->getParameter('token');
        $values2 = array([
            'username'  => $values->username,
            'email'     => $values->email,
            'password'  => Passwords::hash($values->password),
            'fname'     => $values->fname,
            'sname'     => $values->sname,
            'role'      => 'quest'
        ]);
        $this->database->table('users')->insert($values2);
        $this->database->table('permissions')->insert(array([
            'login'     => '1',
            'blog'      => '0',
            'teamedit'  => '0',
            'useredit'  => '0'
        ]));
        $this->database->table('requestregister')->where('token = ?', $token)->delete();
    }

    protected function createComponentSignInForm()
    {
        $form = new Form();
        $form->addText('username', 'Uživatelské jméno');
        $form->addPassword('password', 'Heslo');
        $form->addCheckbox('time','zůstat delší dobu přihlášný');
        $form->addSubmit('send', 'Přihlásit');
        $form->onSuccess[] = function (Form $form, $values)
        {
            try
            {
                if($this->database->table('users')->where('username = ?', $values->username)->count() === 0)
                {
                    $form->addError('Účet neexistuje');

                } else {
                    $id = $this->database->table('users')->where('username = ?', $values->username);
                    $login = $this->database->table('permissions')->get($id);
                    if ($login->login === 1) {
                        $this->user->login($values->username, $values->password);
                        $this->user->setExpiration($values->time ? '1 day' : '1 hour');
                        $this->flashMessage('Úspěšně Přihlášený', 'success');
                        $this->redirect(':Admin:Homepage:default');
                    } else {
                        $this->flashMessage('Nemáte oprávnění k přihlášení', 'danger');
                        $this->redirect('this');
                    }
                }
            } catch (Nette\Security\AuthenticationException $e) {
                $users = $this->database->table('users')->where('username = ?', $values->username)->count();
                if ($users === 0)
                {
                    $form->addError('Uživatel neexistuje.');
                } else {
                    $form->addError('Heslo je špatně.');
                }
            }
        };
        return $form;
    }
}