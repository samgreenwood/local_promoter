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

            }, 0);


        });
    });

    $(document).on('click', '.actions-holder .js-submit', function(e) {
        e.preventDefault();

        var company = $(this).closest('.property');
        var companyId = $(company).attr('data-companyid');
        var note = $(company).find('textarea[name=notes]').val();
        var ratingId = $(company).find('input[name=rating_id]').val();
        var rating = parseInt($(company).find('.user-rating').html());

        $.post( "/users/"+window.userId+"/survey/complete", {company:companyId, 'rating_id':ratingId, 'note' : note, '_token': window.token}, function( data ) {
            var actions = $(company).find('.actions-holder');

            if (rating >= 9) {
                actions.html($('#survey-step-3').html());
                actions.find('.js-facebook-share').attr('data-facebook', data.facebook);
                actions.find('input[name=rating_id]').val(ratingId);
                $('.actions-holder span').popover();
            } else {

                actions.html('<div class="row"><div class="col-md-12 question">Thankyou for your submission.</div></div>');

                setTimeout(function(){
                    $(company).find('.js-hide').trigger('click');
                }, 1000);

            }
        });



    });

    $(document).on('click', '.js-facebook-share', function(e) {
        e.preventDefault();

        var facebook = $(this).attr('data-facebook');

        console.log(facebook);

        FB.ui({
            method: 'send',
            link: facebook
        });
    });

    $(document).on('click', '.js-share', function(e) {
        e.preventDefault();

        var company = $(this).closest('.property');
        var companyId = $(company).attr('data-companyid');
        var ratingId = $(company).find('input[name=rating_id]').val();
        var name = $(company).find('input[name=name]').val();
        var phone = $(company).find('input[name=phone]').val();
        var email = $(company).find('input[name=email]').val();

        $.post( "/users/"+window.userId+"/company/share", {'ratingId':ratingId, company:companyId, 'name':name, 'phone' : phone, 'email':email, '_token': window.token}, function( data ) {
            $(company).find('input[name=name]').val('');
            $(company).find('input[name=phone]').val('');
            $(company).find('input[name=email]').val('');
        });

    });

});