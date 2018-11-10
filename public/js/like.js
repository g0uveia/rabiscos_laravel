
$(document).ready(function() {
    function refreshLikes(elem) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false
        });
        $.post({
            url: urlGetLikes,
            data: {post_id: elem.parent().parent().parent().data('postid'), _token: token}
        })
        .always(function (data) {
            elem.next().html(JSON.parse(data).response);
        });
    }

    setInterval(function() {
        $('.rb-like-button i').each(function() {
            refreshLikes($(this));
        });
    }, 5000);

    $('.rb-like-button').on('click', function (event) {
        event.preventDefault();
        postId = event.target.parentNode.parentNode.parentNode.dataset['postid'];

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {postId: postId, _token: token},
            complete: function(data) {
                console.log(data.responseText);
                if (data.responseText === 'like')
                    event.target.innerText = 'favorite';
                else if (data.responseText === 'dislike')
                    event.target.innerText = 'favorite_border';

                refreshLikes($(event.target));
            }
        });
    });
});
