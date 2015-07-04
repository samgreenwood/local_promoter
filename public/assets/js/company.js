$(document).ready(function($) {


    /**
     * Hide for a day
     */
    $(document).on('click', '.js-hide', function() {
        var company = $(this).parent();
        var companyId = $(company).attr('data-companyid');

        $.post( "/users/"+window.userId+"/hide", {company:companyId, '_token': window.token}, function( data ) {
            $(company).hide('slow');
        });
    });

});