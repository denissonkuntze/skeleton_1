<?php

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\Lib\FwHelper;
use Fw\Lib\FwIR;
use Fw\ViewHelper\FwLayout;
use Laminas\View\Model\ViewModel;

class AttachsController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('upload e attach', '#');
        $layout->enablePageHeader('Upload e Attach');

        return new ViewModel();

    }

    public function testsAction()
    {

        return new ViewModel();

    }

    public function fwformAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('upload e attach', '/samples/upload/fwform');
        $layout->enablePageHeader('Upload');

        $hash = time();

        $form = new \Fw\Lib\FwForm\FwForm();
        $form->setAttribute('class', 'modal-form');

        $upload = new \Fw\Lib\FwForm\ElementFileUpload('upload_single', "upload?field=upload_single");
        $upload->setLabel('Upload arquivo simples');
        $upload->setHelpTextBottom('arquivos aceitos para o upload: .txt');
        $upload->setFilename('filename');
        #$upload->setMultiple();
        #$upload->setNoShowCaption();
        $upload->setCallbackUpload('callbackUpload');
        $form->addElement($upload);

        $html = new \Fw\Lib\FwForm\ElementHtml('hr', "<hr>");
        $form->addElement($html);

        $uploadMultiple = new \Fw\Lib\FwForm\ElementFileUpload('upload_multiple', "upload?field=upload_multiple");
        $uploadMultiple->setLabel('Upload multiplos arquivos');
        $uploadMultiple->setHelpTextBottom('arquivos aceitos para o upload: .txt');
        $uploadMultiple->setFilename('filename');
        $uploadMultiple->setMultiple();
        #$upload->setNoShowCaption();
        #$uploadMultiple->setCallbackUpload('callbackUpload');
        $form->addElement($uploadMultiple);

        #$hashInput = new \Fw\Lib\FwForm\ElementHidden('hash');
        #$form->addElement($hashInput);

        #$form->populateValues(['hash' => $hash]);

        $layout     = FwLayout::getInstance();
        $formUpload = $layout->renderFormInActionController($form, false);

        $viewModel = new ViewModel();
        $viewModel->addChild($formUpload, 'form_upload');

        return $viewModel;

    }

    public function fwattachAction()
    {

        //

        $TDD = new \Fw\Lib\TDDScenarios\TDD();
        $TDD->initFwAttachments(true);

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('upload e attach', '/samples/upload/fwattach');
        $layout->enablePageHeader('Attach (anexos)');

        // formas de listar os anexos/attachs

        $attachment = new \Fw\ViewHelper\FwAttachments();
        $html1      = $attachment->getDivHtml(1, 'attach', '/samples/uploadattach/attachment');
        $html2      = $attachment->getDivHtml(2, 'attachlist', '/samples/uploadattach/attachmentlist');

        $viewModel = new ViewModel();
        $viewModel->setVariable('html1', $html1);
        $viewModel->setVariable('html2', $html2);

        // 2a forma de listar os anexos/attachs

        $attachment = new \Fw\ViewHelper\FwAttachments();
        $attachment->setObjAttachment(new \Fw\Samples\SamplesAttachments());
        $html3 = $attachment->getDivHtmlList(2, 'attachlistnew', '/samples/uploadattach/attachment');

        $viewModel->setVariable('html3', $html3);

        return $viewModel;

    }

    public function attachmentAction()
    {

        $objAttachment = new \Fw\Samples\SamplesAttachments();

        $objUpload = new \Fw\Lib\FwUpload();
        $objUpload->setMultiple(false);
        $objUpload->filesAllowPDF();
        $objUpload->filesAllowImagesPNG();
        $objUpload->filesAllowImagesJPG();
        $objUpload->filesAllowTXT();

        $attachment = new \Fw\ViewHelper\FwAttachments();
        $attachment->setDelete(true);
        $attachment->setObjAttachment($objAttachment);
        $attachment->setObjUpload($objUpload, 'attachtests');
        $attachment->setInputUploadHelpTextBottom(['pdf', 'png', 'jpg', 'txt']);

        return $attachment->getHTML();

    }


    public function attachmentlistAction()
    {

        $objAttachment = new \Fw\Samples\SamplesAttachments();

        $attachment = new \Fw\ViewHelper\FwAttachments();
        $attachment->setButtons(false);
        $attachment->setDelete(true);
        $attachment->setObjAttachment($objAttachment);

        return $attachment->getHTML();

    }


    public function uploadAction()
    {

        $ir = FwIR::getInstance();

        $upload = new \Fw\Lib\FwUpload();
        #$upload->setMultiple();
        $upload->filesAllowTXT();

        if ($_GET['field'] == 'upload_single') {
            $upload->setFieldName('upload_single');
        } else {
            $upload->setMultiple();
            $upload->setFieldName('upload_multiple');
        }

        $return     = $upload->upload();
        $returnInfo = $upload->getInfoUploadFiles();

        if ($upload->isValid() == false) {
            $ir->setHeaderCode400();
        }

        return $ir->getResponseJsonHeader();

    }

}
