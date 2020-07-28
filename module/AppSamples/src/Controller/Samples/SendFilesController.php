<?php

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\Lib\FwHelper;
use Fw\Lib\FwIR;
use Fw\ViewHelper\FwLayout;
use Laminas\View\Model\ViewModel;

class SendFilesController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('upload e attach', '#');
        $layout->enablePageHeader('SendFiles');

        return new ViewModel();

    }

    public function sendAction()
    {
        return $this->send(1);
    }

    public function sendManyAction()
    {
        return $this->send(3);
    }

    private function send($files)
    {

        $file1 = new \Fw\Lib\SendFiles\File();
        $file1->setName('file1', 'arquivo de teste 1');
        $file1->setTypePDFFileLocal(\ROOT_PATH . '/module/Fw/test/lib/_files/pdftestsample.pdf');

        $pdf = new \Fw\Samples\SamplesPDF();

        $file2 = new \Fw\Lib\SendFiles\File();
        $file2->setName('file2', 'arquivo de teste 2');
        $file2->setTypePDF($pdf);
        $file2->addParam('headerAndFooter', true);

        $file3 = new \Fw\Lib\SendFiles\File();
        $file3->setName('file3', 'arquivo de teste 3');
        $file3->setTypePDF($pdf, 'printViewHelper');

        $sendfile = new \Fw\Lib\SendFiles\SendFiles();
        $sendfile->setUrlAction('/samples/sendfiles/send-many');
        $sendfile->addFile($file1);

        if ($files > 1) {
            $sendfile->addFile($file2);
            $sendfile->addFile($file3);
        }

        $sendfile->setEmailToValue('dk@lune.com.br');
        $sendfile->setEmailText(true, 'texto do conteúdo');
        $sendfile->setEmailCallback(function ($params): bool {

            $emailTo         = $_POST['email_to'];
            $emailToName     = 'NameTo';
            $emailToFrom     = 'dk@solucoesnet.com.br';
            $emailToFromName = 'NameFrom';

            $email = new \Fw\Samples\SamplesEmail();
            $email->setImmediateDispatch();

            if (isset($params['attachments'])) {
                foreach ($params['attachments'] AS $attach) {
                    $email->addAttachmentFileS3($attach);
                }
            }

            return $email->addEmailContent($emailTo, $emailToName, $emailToFrom, $emailToFromName, 'TDD_MSG_CONTENT', 'TAG1', $_POST['email_content']);

        }, ['p1' => 1, 'p2' => 2]);

        $sendfile->setWhatsappToPhone('48999585693');
        $sendfile->setWhatsappText(true, 'texto do conteúdo');
        $sendfile->setWhatsappCallback(function ($params): bool {

            $message = new \Fw\Samples\SamplesWhatsapp();
            $message->setPhoneTo($_POST['message_to']);
            $message->setImmediateDispatch();

            if (isset($params['attachments'])) {
                foreach ($params['attachments'] AS $attach) {
                    $message->addFileUrl($attach['url'], $attach["filename"], $attach["filename"]);
                }
            }

            if (isset($_POST['message_content']) AND empty($_POST['message_content']) == false) {
                $message->setMessage($_POST['message_content']);
            }

            return $message->addMessage();

        }, ['p1' => 1, 'p2' => 2]);

        return $sendfile->run();

    }


}
