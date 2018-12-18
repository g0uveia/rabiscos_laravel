
$(document).ready(function() {
    function refreshLikes(elem) {
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
            json = JSON.parse(data);
            console.log(json);
            elem.next().html('<small class="align-middle text-muted">' + json.num_likes + '</small>');
            num_likes = parseInt(json.num_likes);
            container_list_elem = elem.parent().next(".rb-post-like-list");

            if (num_likes > 0) {
                list = '<div class="card-body"><ul>';

                for (i = 0; i < num_likes; i++) {
                    user = json.user_list[i];
                    list += tagListItem(user['username'], user['url'], user['img_path']);
                }

                list += '</ul></div>';

                container_list_elem.html(list);
            } else {
                container_list_elem.html('');
            }
        });
    }

    setInterval(function() {
        $('.rb-like-button i').each(function() {
            refreshLikes($(this));
        });
    }, 10000);

    $('.rb-like').hover(function () {
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
