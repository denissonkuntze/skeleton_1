/**
 * Created by Denisson.Kuntze on 08/03/2017.
 */
$( function () {

    $( ".test" ).submit(function( e ) {
        e.preventDefault();
    });

    $('#submit').on('click', function (e) {

        e.preventDefault();

        fwRemoveLabelErrors();

        fwActionAjaxPOST( '/samples/form/formajax', '.test' );


    });
    $('#submitmasks').on('click', function (e) {

        e.preventDefault();

        fwRemoveLabelErrors();

        fwActionAjaxPOST( '', '.test', { callbackSuccess: function( jqXHR ) {

            var returnJson = fwJsonDecode( jqXHR.responseText );

            $('.alert-info').empty().html( JSON.stringify(returnJson.data) );

        } } );

    });

    // Data
    var array_data = [
        {id: 0, text: 'enhancement'},
        {id: 1, text: 'bug'},
        {id: 2, text: 'duplicate'},
        {id: 3, text: 'invalid'},
        {id: 4, text: 'wontfix'}
    ];

    $('#select_simple').select2();

    $('#select_data').select2({
            placeholder: "Click to load data",
            minimumResultsForSearch: Infinity,
            data: array_data
    });

    // Format displayed data
    function formatRepo (repo) {

        if (repo.loading) return repo.text;

        var markup = "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

        if (repo.description) {
            markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
        }

        markup += "<div class='select2-result-repository__statistics'>" +
            "<div class='select2-result-repository__forks'>" + repo.forks_count + " Forks</div>" +
            "<div class='select2-result-repository__stargazers'>" + repo.stargazers_count + " Stars</div>" +
            "<div class='select2-result-repository__watchers'>" + repo.watchers_count + " Watchers</div>" +
            "</div>" +
            "</div></div>";

        return markup;

    }

    // Format selection
    function formatRepoSelection (repo) {
        return repo.full_name || repo.text;
    }

    $("#select_remote_1").select2({
        ajax: {
            url: "https://api.github.com/search/repositories",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {

                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

} );