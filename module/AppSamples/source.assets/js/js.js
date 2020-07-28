/**
 * Created by Denisson.Kuntze on 07/03/2017.
 */

$(function ()
{

    ////////////////////////////////////////////////////////////////////////////
    // notifications ///////////////////////////////////////////////////////////

    $('.not-default').on('click', function (e)
    {
        e.preventDefault();
        fwNotification('mensagem de teste');
    });

    $('.not-success').on('click', function (e)
    {
        e.preventDefault();
        fwNotification('mensagem de sucesso', 'success');
    });

    $('.not-danger').on('click', function (e)
    {
        e.preventDefault();
        fwNotification('mensagem de erro', 'danger');
    });

    $('.not-sticky').on('click', function (e)
    {
        e.preventDefault();
        fwNotification('mensagem de erro estática, a mensagem deve ser fechada', 'danger', null, {'hide': false});
    });

    $('.not-top').on('click', function (e)
    {
        e.preventDefault();
        fwNotification('mensagem', 'success', 'top');
    });

    $('.not-close').on('click', function (e)
    {
        e.preventDefault();
        fwCloseNotifications();
    });

    ////////////////////////////////////////////////////////////////////////////
    // action //////////////////////////////////////////////////////////////////

    $('.action-get').on('click', function (e)
    {
        e.preventDefault();
        fwActionAjaxGET('/samples/js/actionget?test=1');
    });

    $('.action-post').on('click', function (e)
    {
        e.preventDefault();
        fwActionAjaxPOST('/samples/js/actionpost', '#form-action-post');
    });

    $('.action-callback').on('click', function (e)
    {
        e.preventDefault();
        fwActionAjaxGET('/samples/js/actionget?test=1', {
            notificationSuccess: false,
            callbackSuccess    : function ()
            {
                actionModalConfirm(1, 2);
            }
        });
    });

    $('.action-content').on('click', function (e)
    {
        e.preventDefault();
        fwActionAjaxGetContent('/samples/js/gethtml?test=1', '.get_content', {
            notificationSuccess: false,
            callbackSuccess    : function ()
            {
                actionModalConfirm(1, 2);
            }
        });
    });

    ////////////////////////////////////////////////////////////////////////////
    // alert ///////////////////////////////////////////////////////////////////

    $('.alert-msg').on('click', function (e)
    {
        e.preventDefault();
        fwModalAlert('Esta é uma mensagem de aviso.');
    });

    $('.alert-msg-modal').on('click', function (e)
    {
        e.preventDefault();
        fwModalAlert('Esta é uma mensagem de aviso modal. Para fechar somente confirmando no botão.', {
            btnYesLabel: 'Entendi',
            closable   : false
        });
    });

    ////////////////////////////////////////////////////////////////////////////
    // confirm//////////////////////////////////////////////////////////////////

    $('.confirm').on('click', function (e)
    {
        e.preventDefault();
        fwModalConfirmYesNo('Deseja mesmo fazer esta ação?', function ()
        {
            actionModalConfirm(1);
        });
    });

    $('.confirm-labels').on('click', function (e)
    {
        e.preventDefault();
        fwModalConfirm('Deseja mesmo fazer esta ação?', function ()
        {
            actionModalConfirm(1);
        }, {
            btnYesLabel: 'Concordo',
            btnNoLabel : 'Não concordo'
        });
    });

    $('.confirm-modal').on('click', function (e)
    {
        e.preventDefault();
        fwModalConfirm('Deseja mesmo fazer esta ação?', function ()
        {
            actionModalConfirm(1);
        }, {
            closable: false
        });
    });

    $('.confirm-cancel').on('click', function (e)
    {
        e.preventDefault();
        fwModalConfirmOrCancel('Deseja mesmo fazer esta ação?', function ()
        {
            actionModalConfirm(1);
        }, {
            closable: true
        });
    });

    $('.confirm-disabled-btn').on('click', function (e)
    {
        e.preventDefault();
        fwModalConfirm('Deseja mesmo fazer esta ação?', function ()
        {
            actionModalConfirm(1);
        }, {btnYesClass: 'hide'});
    });

    ////////////////////////////////////////////////////////////////////////////
    // dialog //////////////////////////////////////////////////////////////////

    //fwModalDialogAjaxForm( url, idClassForm, options ) abra o conteudo do form em um confirm, se ok posta o formulário e verifica o retorno

    $('.modal-content-html').on('click', function (e)
    {
        e.preventDefault();
        fwModalDialogAjax('/samples/js/gethtml', function ()
        {
            actionModalConfirm(1);
        }, {}, {
            closable   : false,
            btnYesLabel: 'Aceito!'
        });
    });

    $('.modal-content-view').on('click', function (e)
    {
        e.preventDefault();
        fwModalDialogAjax('/samples/js/gethtmlview', function ()
        {
            actionModalConfirm(1);
        });
    });

    $('.modal-content-json').on('click', function (e)
    {
        e.preventDefault();
        fwModalDialogAjax('/samples/js/gethtmljson', function ()
        {
            actionModalConfirm(1);
        }, {block: true}, {btnYesLabel: 'Entendi'});
    });

    ////////////////////////////////////////////////////////////////////////////
    // post de formulario //////////////////////////////////////////////////////

    $('.modal-form').on('click', function (e)
    {
        e.preventDefault();
        fwModalDialogAjaxForm('/samples/js/modalactionpostform', '#contact-form', false);
    });

    $('.modal-form-callback').on('click', function (e)
    {

        e.preventDefault();

        fwModalDialogAjaxForm('/samples/js/modalactionpostform', '#contact-form', false, {
            notificationSuccess: false,
            callbackSuccess    : function ()
            {
                actionModalConfirm(1);
            }
        }, {
            title: 'Editar',
            size : 'size-wide',
            closable: true,
            onShow  : function ()
            {
                console.log('modalDialog onShow()');
            }
        });

    });

    ////////////////////////////////////////////////////////////////////////////

    //    $('.modal-action-post-form-callback').on('click', function () {
    //        fwActionAjaxForm( false, '/fw/samples/js/modalactionpostform', '#contact-form', { notificationSuccess:false, callbackSuccess:function() { actionModalConfirm(1,2); }}  );
    //    });

    ////////////////////////////////////////////////////////////////////////////
    // abre um conteudo ajax via get

    fwActionAjaxGetContent('/samples/js/gethtmlauto', '.content-ajax-1');

    ////////////////////////////////////////////////////////////////////////////
    // block ///////////////////////////////////////////////////////////////////

    $('.block-page').on('click', function (e)
    {

        e.preventDefault();

        fwBlock();

        window.setTimeout(function ()
        { // como é um exemplo depois de 2s cancela o bloqueio
            fwCloseBlock();
        }, 2000);

    });

    $('.block-msg').on('click', function (e)
    {

        e.preventDefault();

        fwBlock('... processando, aguarde ...');

        window.setTimeout(function ()
        { // como é um exemplo depois de 2s cancela o bloqueio
            fwCloseBlock();
        }, 2000);

    });

    $('.block-per').on('click', function (e)
    {

        e.preventDefault();

        fwBlock('... processando ...', 15);

        // como é um exemplo abaixo esta as mudanças de % a cada segundo

        window.setTimeout(function ()
        {
            $('.progress-bar-success').css('width', '45%');
        }, 1000);

        window.setTimeout(function ()
        {
            $('.progress-bar-success').css('width', '75%');
        }, 2000);

        window.setTimeout(function ()
        {
            fwCloseBlock();
        }, 3000);

    });

    $('.block-div').on('click', function (e)
    {

        e.preventDefault();

        console.log('lock-div');

        fwBlock(null, null, 'block-test');

        window.setTimeout(function ()
        { // como é um exemplo depois de 2s cancela o bloqueio
            fwCloseBlock('block-test');
        }, 5000);

    });

    $('.block-close').on('click', function (e)
    {

        e.preventDefault();

        fwCloseBlock();
        fwCloseBlock('block-test');

    });

    ////////////////////////////////////////////////////////////////////////////
    // pace ////////////////////////////////////////////////////////////////////

    $('.pace-start').on('click', function ()
    {

        $.ajax({
            url     : '/fw/samples/pluginsjs/ajaxtime',
            type    : 'GET',
            complete: function (jqXHR, textStatus)
            {

                //returnJson = fwJsonDecode( jqXHR.responseText );

            }
        });

    });

    $('.pace-stop').on('click', function ()
    {

        console.log('pace stop');
        Pace.stop();

    });

});

function actionModalConfirm(param1, param2)
{

    fwNotification('Se esta vendo esta mensagem é porque esta executando função js de callBack ...', 'info');
    console.log('executando: ' + param1 + ' / ' + param2);

}