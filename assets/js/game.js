var Game = (function ($) {
    var count = 0;
    var init = function(){
        beginGame();
    };

    var beginGame = function(){
        $('#start-game').click(function(){
            $('.shapes').removeClass('hidden');
            startTimer();
            countSqures();
            $('.shapes').html();
        });
    };

    var countSqures = function(){

        $('.square').click(function(){
            var score = $('#score').html();
            if(score == 0){  
                $('#timer').timer('pause');
                alert("well done");
                $('.shapes').html();
                $("#play_game_score").val($('#score').html() + 1);
                $("#play_game_level").val($('#level').html());
                $("#play_game_time_taken").val($('#timer').data('seconds'));
                $('.shapes').html($('.shape-submit-section').html());
            }
            $(this).remove('slow');
            $('#score').html(++score);
            $(this).removeClass('square');
        });
    };

    var startTimer = function(){
        $('#timer').timer({
            duration: $('#timer').data('time'),
            callback: function() {
                alert('Time up!');
                $('.shapes').html();
                $("#play_game_score").val($('#score').html() + 1);
                $("#play_game_level").val($('#level').html());
                $("#play_game_time_taken").val($('#timer').html());
                $('.shapes').html($('.shape-submit-section').html());
            }
        });
    };

    return {
        init: init
    }
})(jQuery);