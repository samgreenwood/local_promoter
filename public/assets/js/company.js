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


    /**
     * User doing survey
     */
    $(document).on('click', '.rating-holder .rating', function(e) {
        e.preventDefault();
        var rating = $(this).html();

        $(this).css('background-color', '#073855');

        var company = $(this).closest('.property');
        var companyId = $(company).attr('data-companyid');

        $.post( "/users/"+window.userId+"/survey", {company:companyId, rating:rating, '_token': window.token}, function( data ) {
            setTimeout(function(){
                var actions = $(company).find('.actions-holder');

                actions.html($('#survery-step-2').html());
                actions.find('.user-rating').html(rating);
                actions.find('input[name=rating_id]').val(data.resultId);

            }, 500);


        });
    });

    $(document).on('click', '.actions-holder .js-submit', function(e) {
        e.preventDefault();

        var company = $(this).closest('.property');
        var companyId = $(company).attr('data-companyid');
        var note = $(company).find('textarea[name=notes]').val();
        var ratingId = $(company).find('input[name=rating_id]').val();

        $.post( "/users/"+window.userId+"/survey/complete", {company:companyId, 'rating_id':ratingId, 'note' : note, '_token': window.token}, function( data ) {
            var actions = $(company).find('.actions-holder');
            actions.html('');
            console.log('sdf');
        });


        console.log(ratingId);
    });

});