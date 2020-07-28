<?php

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Samples\Forms\fwformview;
use Laminas\View\Model\ViewModel;
use Laminas\Stdlib\ArrayObject;
use Laminas\Form\Element;
use Laminas\Form\Form;

use AppSamples\Controller\Abs\AbstractSamplesController;
use AppSamples\Controller\Samples\Forms\ContactForm;
use Fw\ViewHelper\FwLayout;
use Fw\Lib\FwIR;

class FormController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('form', '/fw/samples/form/');

        return new ViewModel();

    }

    public function inputAction()
    {

        $text = new Element\Text('my-text');
        $text->setLabel('Enter your name');

        $form = new Form('my-form');
        $form->add($text);

        return new ViewModel(['form' => $form]);

    }

    public function gethtmlformcollectionAction()
    {

        $form = new ContactForm();
        $form->setAttribute('action', 'formpost');
        $form->setAttribute('method', 'post');
        $form->setAttribute('class', 'form-class');

        return new ViewModel(['form' => $form]);

    }

    public function gethtmlformrenderAction()
    {

        $form = new ContactForm();

        return new ViewModel(['form' => $form]);

    }

    public function gethtmlformbsAction()
    {

        $form = new ContactForm();

        return new ViewModel(['form' => $form]);

    }

    public function testviewAction()
    {

        $view = new ViewModel();
        $view->setVariables(['var1' => 123]);
        $view->setTemplate('fw/tableform/layout');

        $form = new ContactForm();
        $form->setAttribute('action', 'testview');

        $data = [
            'name'    => '  John Doe  ',
            'email'   => 'j.doe@example.tld',
            'subject' => '[Contact Form] \'sup?',
        ];
        $form->setData($data);

        if ($this->request->isPost()) {

            // Get the data. In an MVC application, you might try:
            $data = $this->request->getPost();  // for POST data

            $form->setData($data);

            // Validate the form
            if ($form->isValid()) {
                $messages = $form->getData();
            } else {
                $messages = $form->getMessages();
            }

            $view->setVariable('message', json_encode($messages));

        }

        $content = new ViewModel();
        $content->setVariables(['form' => $form]);
        $content->setTemplate('app-samples/samples/form/gethtmlformbs');

        $view->addChild($content, 'content');

        return $view;

    }

    public function setdataAction()
    {

        $form = new ContactForm();

        $data = [
            'name'    => '  John Doe  ',
            'email'   => 'j.doe@example.tld',
            'subject' => '[Contact Form] \'sup?',
        ];
        $form->setData($data);

        if ($form->isValid()) {
            // $contact now has the following structure:
            // [
            //     'name'    => 'John Doe',
            //     'email'   => 'j.doe@example.tld',
            //     'subject' => '[Contact Form] \'sup?',
            //     'message' => 'Type your message here',
            // ]
            // But is an ArrayObject instance!
        }

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('app-samples/samples/form/gethtmlformbs');

        return $viewModel;

    }

    public function binddataAction()
    {

        $form = new ContactForm();

        $contact            = new ArrayObject;
        $contact['name']    = ' John Doe   ';
        $contact['subject'] = '[Contact Form] ';
        $contact['message'] = 'Type your message here';

        $form->bind($contact);

        if ($form->isValid()) {
            // $contact now has the following structure:
            // [
            //     'name'    => 'John Doe',
            //     'email'   => 'j.doe@example.tld',
            //     'subject' => '[Contact Form] \'sup?',
            //     'message' => 'Type your message here',
            // ]
            // But is an ArrayObject instance!
        }

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('app-samples/samples/form/gethtmlformbs');

        return $viewModel;

    }

    public function validateAction()
    {

        $form = new ContactForm(['subject' => false]);

        $data = [
            'name'    => '  John Doe  ',
            'email'   => 'j.doe@example.tld',
            'subject' => '[Contact Form] \'sup?',
        ];
        $form->setData($data);

        if ($form->isValid()) {
            // $contact now has the following structure:
            // [
            //     'name'    => 'John Doe',
            //     'email'   => 'j.doe@example.tld',
            //     'subject' => '[Contact Form] \'sup?',
            //     'message' => 'Type your message here',
            // ]
            // But is an ArrayObject instance!
        }

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('app-samples/samples/form/gethtmlformbs');

        return $viewModel;

    }

    public function disableinputAction()
    {

        $form = new ContactForm(['subject' => false]);

        $data = [
            'name'    => '  John Doe  ',
            'email'   => 'j.doe@example.com',
            'subject' => '[Contact Form] \'sup?',
        ];
        $form->setData($data);

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('app-samples/samples/form/gethtmlformbs');

        return $viewModel;

    }

    public function disablerequiredAction()
    {

        $form = new ContactForm(['subject' => false]);

        $data = [
            'name'    => 'NOT_REQUIRED',
            'email'   => 'j.doe@example.com',
            'subject' => '[Contact Form] \'sup?',
        ];
        $form->setData($data);

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('app-samples/samples/form/gethtmlformbs');

        return $viewModel;

    }

    public function formpostAction()
    {

        $form = new ContactForm();

        $viewModel = new ViewModel();

        if ($this->request->isPost()) {

            // Get the data. In an MVC application, you might try:
            $data = $this->request->getPost();  // for POST data

            $form->setData($data);

            // desliga o filtra do sibject

            if (isset($data->subject) == false) {

                $form->remove('subject');
                $form->getInputFilter()->remove('subject');

            }

            if (isset($data->name) AND $data->name == 'NOT_REQUIRED') {
                $form->getInputFilter()->get('name')->setRequired(false);
            }

            if ($form->isValid()) {
                $messages = $form->getData();
            } else {
                $messages = $form->getMessages();
            }

            $viewModel->setVariable('message', json_encode($messages));

        }

        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('app-samples/samples/form/gethtmlformbs');

        return $viewModel;

    }

    public function fwformviewAction()
    {

        $messages = [];
        $form     = new fwformview();

        if ($this->request->isPost()) {

            $data = $this->request->getPost()->toArray();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {
                $messages = $form->getData();
            } else {
                $messages = $form->getMessages();
            }

        }

        //        $data = [
        //            'name'    => 'John Doe',
        //            'email'   => 'j.doe@example.com',
        //            'hidden'  => 'aqui vai o hidden',
        //        ];
        //        $form->setData($data);

        $send = new Element('submit');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        $form->add($send);

        return ['form' => $form, 'messages' => json_encode($messages)];

    }

    public function fwformrenderAction()
    {

        $messages = [];
        $form     = new \AppSamples\Controller\Samples\Forms\fwformrender();

        if ($this->request->isPost()) {

            $data = $this->request->getPost()->toArray();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {
                $messages = $form->getData();
            } else {
                $messages = $form->getMessages();
            }

        }

        //        $data = [
        //            'name'    => 'John Doe',
        //            'email'   => 'j.doe@example.com',
        //            'hidden'  => 'aqui vai o hidden',
        //        ];
        //        $form->setData($data);

        $send = new Element('submit');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        #$form->add( $add );

        return ['form' => $form, 'messages' => json_encode($messages)];

    }

    public function testAction()
    {

        $content = new ViewModel();

        $viewModel = new ViewModel();
        $viewModel->setTemplate('fw/samples/class-form/gethtmlformcollection');

        $form = new \Fw\Controller\Samples\Forms\CustomerForm();

        if ($this->request->isPost()) {

            $data = $this->request->getPost();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {
                $messages = $form->getData();
            } else {
                $messages = $form->getMessages();
            }

            $content->setVariable('message', json_encode($messages));

        }

        $data = [
            'name'  => 'John Doe',
            'email' => 'j.doe@example.com',
        ];
        #$form->setData($data);

        $send = new Element('add');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        $form->add($send);

        $viewModel->setVariables(['form' => $form]);

        #return $viewModel;

        $tableform = new \Fw\Lib\ListForm\ListFormHeader('simple', $this->getRequest());

        $content->setVariables(['form' => $form]);
        $content->setTemplate('fw/samples/class-form/formbootstrap');

        $tableform->setContent($content);

        return $tableform->getView();

    }

    public function testformAction()
    {

        $viewModel = new ViewModel();
        $form      = new \Fw\Controller\Samples\Forms\CustomerForm();

        if ($this->request->isPost()) {

            $data = $this->request->getPost()->toArray();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {

                $messages = $form->getData();

                $model       = new \Fw\Models\FwCustomer();
                $returnModel = $model->insert($messages);

                $messages['id'] = $model->getLastInsertValue();

            } else {
                $messages = $form->getMessages();
            }

            $viewModel->setVariable('message', json_encode($messages));

        }

        $data = [
            'name'  => 'John Doe',
            'email' => 'j.doe@example.com',
        ];
        #$form->setData($data);

        $send = new Element('add');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        $form->add($send);

        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('fw/samples/class-form/formbootstrap');

        return $viewModel;

    }

    public function testformbsAction()
    {

        $viewModel = new ViewModel();
        $form      = new \Fw\Controller\Samples\Forms\CustomerForm();

        if ($this->request->isPost()) {

            $data = $this->request->getPost()->toArray();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {

                $messages = $form->getData();

                $model       = new \Fw\Models\FwCustomer();
                $returnModel = $model->insert($messages);

                $messages['id'] = $model->getLastInsertValue();

            } else {
                $messages = $form->getMessages();
            }

            $viewModel->setVariable('message', json_encode($messages));

        }

        $data = [
            'name'  => 'John Doe',
            'email' => 'j.doe@example.com',
        ];
        #$form->setData($data);

        $send = new Element('add');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        $form->add($send);

        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('fw/samples/class-form/formbootstrap2');

        return $viewModel;

    }

    public function testformbsfwAction()
    {

        $viewModel = new ViewModel();
        $form      = new \Fw\Controller\Samples\Forms\CustomerFwForm();

        if ($this->request->isPost()) {

            $data = $this->request->getPost()->toArray();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {

                $messages = $form->getData();

                $model       = new \Fw\Models\FwCustomer();
                $returnModel = $model->insert($messages);

                $messages['id'] = $model->getLastInsertValue();

            } else {
                $messages = $form->getMessages();
            }

            $viewModel->setVariable('message', json_encode($messages));

        }

        $data = [
            'name'   => 'John Doe',
            'email'  => 'j.doe@example.com',
            'hidden' => 'aqui vai o hidden',
        ];
        $form->setData($data);
        $form->get('hidden')->setValue('123');

        $send = new Element('add');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        #$form->add( $add );

        #$form->setAction( '/' );
        #$form->setAction( $this->url('fw-home') );

        $viewModel->setVariables(['form' => $form]);
        $viewModel->setTemplate('app-samples/samples/form/formbootstrap2');

        return $viewModel;

    }

    public function formajaxAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addJsHead('../samples/js/class.form.js', $layout::JS_TYPE_APP);

        $messages = [];
        $form     = new \AppSamples\Controller\Samples\Forms\fwformrender();

        $form->setAttribute('id', 'test');
        $form->setAttribute('class', 'test');

        #if ($this->request->isPost()) {
        if (isset($_POST['AF'])) {

            $ir = FwIR::getInstance();

            $data = $this->request->getPost()->toArray();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {
                $messages = $form->getData();
                $ir->addSuccessMsg('formulário válido');
            } else {
                $messages = $form->getMessages();
                $ir->addErrorMessagesInputFilter($messages);
            }

            return $ir->getResponseJsonHeader();

        }

        $send = new Element('submit');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        #$form->add( $add );

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $form, 'messages' => json_encode($messages)]);
        $viewModel->setTemplate('app-samples/samples/form/fwformrender');

        return $viewModel;

    }

    public function masksAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addJsHead('../samples/js/class.form.js', $layout::JS_TYPE_APP);

        $messages = [];
        $form     = new \AppSamples\Controller\Samples\Forms\fwformmasks();

        $form->setAttribute('class', 'test');

        #if ($this->request->isPost()) {
        if (isset($_POST['_FW'])) {

            $ir = FwIR::getInstance();

            $data = $this->request->getPost()->toArray();  // for POST data

            $form->setData($data);

            if ($form->isValid()) {
                $data = $form->getData();
                $ir->addSuccessMsg('formulário válido');
                $ir->addDataReturn('data', $data, false);
            } else {
                $ir->addErrorMessagesInputFilter($form->getMessages());
            }

            return $ir->getResponseJsonHeader();

        }

        //        $add = new Element('submit');
        //        $add->setValue('Submit');
        //        $add->setAttributes([
        //            'type' => 'submit',
        //        ]);
        //        $form->add( $add );

        $data['integer']     = 1;
        $data['number']      = 1234.56;
        $data['price']       = 1234.56;
        $data['phone']       = '48999585693';
        $data['postalcode']  = '88080420';
        $data['date']        = '2017-03-20';
        $data['cpf']         = '00648919927';
        $data['cnpj']        = '08955672000162';
        $data['picker_date'] = '2017-03-25';
        $data['radio']       = 2;

        $form->setData($data);

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form' => $form, 'messages' => json_encode($messages)]);
        $viewModel->setTemplate('app-samples/samples/form/fwformrender');

        return $viewModel;

    }

    public function select2Action()
    {

        if (isset($_GET['q']) OR isset($_GET['ids'])) {

            if (isset($_GET['q'])) {

                $data[] = ['id' => 1, 'text' => 'TAG1'];
                $data[] = ['id' => 2, 'text' => 'TAG2'];
                $data[] = ['id' => 3, 'text' => 'TAG3'];

                if ($_GET['q'] == 'TAG') {

                    unset($data);

                    $data[] = ['id' => 4, 'text' => 'TAG4'];
                    $data[] = ['id' => 5, 'text' => 'TAG5'];
                    $data[] = ['id' => 6, 'text' => 'TAG6'];

                }

            }

            if (isset($_GET['ids'])) {

                $data[] = ['id' => 1, 'text' => 'TAG1'];
                $data[] = ['id' => 3, 'text' => 'TAG3'];

            }

            $IR = FwIR::getInstance();
            $IR->addRecords($data);

            return $IR->getResponseJsonHeader();

        }

        $viewModel = new ViewModel();
        $viewModel->setTemplate('app-samples/samples/form/select2');

        return $viewModel;

    }

}
