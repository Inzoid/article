//search XHR

$('.search-text').on('keyup', function() {
        $.ajax({
            url: '/articles',
            type: 'GET',
        dataType: 'json',
        data : {
            'search': $('.search-text').val()
        },
        success:function (data) {
            $('.articles_list').html(data['view']);
            console.log(data);
        },
        error: function(xhr, status) {
            console.log(xhr.error + "ERROR STATUS : " + status);
        },
        complete: function () {
            alreadyloading = false;
        }
    });
});

$('.comment').on('click', function() {
        $.ajax({
            url: '/show',
            type: 'POST',
        dataType: 'json',
        data : {
            'comment': $('.show_comment').serialize()
        },
        success:function (data) {
            $('.show_comment').html(data['view']);
            console.log(data);
        },
        error: function(xhr, status) {
            console.log(xhr.error + "ERROR STATUS : " + status);
        },
        complete: function () {
            alreadyloading = false;
        }
    });
});

