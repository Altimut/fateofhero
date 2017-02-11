<?php
/**
 * Created by PhpStorm.
 * User: altisek
 * Date: 03.02.2017
 * Time: 19:36
 */

namespace AdminModule;

use Nette\Application\UI\Form;
use Nette\Utils\FileSystem;
use Nette\Utils\Image;

class GalleryPresenter extends BasePresenter
{
    public function renderDefault()
    {
        $this->template->gallerys = $this->database->table('gallery');
    }
    public function renderNew()
    {

    }
    protected function createComponentImageUploadForm()
    {
        $form = new Form();
        $form->addText('title','Popis obrázku');
        $form->addUpload('image', 'Obrázek');
        $form->addSubmit('save','Nahrát');
        $form->onSuccess[] = array($this,'ImageUpload');
        return $form;
    }
    public function ImageUpload(Form $form, $values)
    {
        $file = $values->image;
        if($file->isImage() and $file->isOk())
        {
            $file_ext=strtolower(mb_substr($file->getSanitizedName(), strrpos($file->getSanitizedName(), ".")));
            $file_name = uniqid(rand(0,20), TRUE).$file_ext;
            $file->move(__DIR__ . '/../../../www/images/gallery/'. $file_name);
            $this->database->table('gallery')->insert(array(
                'image' => $file_name,
                'title' => $values->title
            ));
            $image = Image::fromFile(__DIR__ . '/../../../www/images/gallery/'. $file_name);
            $watermark = Image::fromFile(__DIR__ . '/../../../www/images/logo.png');
            $image->place($watermark, '10%', '75%', 30);
            $image->save(__DIR__ . '/../../../www/images/gallery/'. $file_name);
            $this->flashMessage('Úspěšně nahraný','success');
        }else{
            $this->flashMessage('Stala se chyba','danger');
        }
        $this->redirect(':Admin:Gallery:default');
    }

    public function handleDelete($id)
    {
        $ids = $this->database->table('gallery')->get($id);
        if(!$ids)
        {
            $this->flashMessage('Obrázek neexistuje','danger');
            $this->redirect(':Admin:Gallery:default');
        } else {
            $file = $this->database->table('gallery')->where('id = ?', $id)->fetch();
            FileSystem::delete(__DIR__ . '/../../../www/images/gallery/' . $file->image);
            $this->database->table('gallery')->where('id = ?', $id)->delete();
            if($this->isAjax())
            {
                $this->redirect(':Admin:Gallery:default');
            }else{
                $this->redirect(':Admin:Gallery:default');
            }
        }
    }

}