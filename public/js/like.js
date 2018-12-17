
$(document).ready(function() {
    function refreshLikes(elem) {
        console.log(elem);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post({
            url: urlGetLikes,
            data: {post_id: elem.parent().parent().parent().parent().data('postid'), _token: token}
        })
        .always(function (data) {
            console.log(data);
            json = JSON.parse(data);
            elem.next().html(json.num_likes);
            console.log(json);
            list = '';
            for (i = 0; i < json.user_list.length; i++) {
                user = json.user_list[i];
                console.log(user);
                list += tagListItem(user['username'], user['url']);
            }

            elem.parent().next().find('ul').html(list);
        });
    }

    setInterval(function() {
        $('.rb-like-button i').each(function() {
            refreshLikes($(this));
        });
    }, 1000000);

    $('.rb-like').hover(function () {
        if (true)
            $(this).children('.rb-post-like-list').css('display', 'block');
    }, function () {
        $(this).children('.rb-post-like-list').css('display', 'none');
    });

    $('.rb-like-button').click(function () {
        event.preventDefault();
    })
    $('.rb-like-button i').on('click', function (event) {
        postId = event.target.parentNode.parentNode.parentNode.parentNode.dataset['postid'];

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
                if (data.responseText === 'like') {
                    event.target.innerText = 'favorite';
                    $(event.target).removeClass('text-muted');
                }
                else if (data.responseText === 'dislike') {
                    event.target.innerText = 'favorite_border';
                    $(event.target).addClass('text-muted');
                }

                refreshLikes($(event.target));
            }
        });
    });
});
