<style>

    #favorite-list ul {
        margin: 0 0 20px 0;
        width: 1060px;
        background-color: #eee;
        border: 1px dotted #4A4A4A;
        padding: 15px 16px 15px 16px;
        float: right;
    }

    #favorite-list ul li {
        float: right;
        margin: 0 0 5px 15px;
        padding: 9px 0;
        width: 290px;
        border: 1px solid #eee;
        cursor: pointer;
    }

    #favorite-list li:hover {
        background-color: #fafafa;
        border: 1px solid #d2d2d2;
    }

    #favorite-list li.active {
        background-color: #fafafa;
        border: 1px solid #d2d2d2;
    }

    #favorite-list li a {
        float: right;
        width: 100%;
    }

    #favorite-list li img {
        float: right;
    }

    #favorite-list li p {
        margin: 9px 5px 0 0;
        color: #3c3c3c;
        font-size: 8.5pt;
        float: right;
    }

    #favorite-list li:first-child p {
        color: #e94708;
    }

    #favorite-list li:hover p {
        color: #e94708;
    }

    #favorite-list li i {
        width: 15px;
        height: 15px;
        float: left;
        background: url(/images/icon-edit-16.png);
        margin: -2px 0 0 3px;
        display: none;
    }

    .liked-item {
        width: 100%;
        float: right;
        margin-bottom: 35px;
    }

    .liked-item .image {
        width: 110px;
        height: 110px;
        float: right;
        background-color: #f2f2f2;
        border: 1px solid #c6c6c6;
        text-align: center;
        margin-left: 10px;
    }

    .liked-item .image img {
        width: 100px;
        height: 100px;
        margin-top: 5px;
    }

    .liked-item h4 {
        font-size: 10.2pt;
        color: #636363;
        padding: 10px 0 7px 0;
        border-bottom: 1px solid #e2e2e2;
        border-top: 1px solid #e2e2e2;
        margin: 0;
        float: right;
        width: 968px;
    }

    .liked-item h4 i {
        width: 15px;
        height: 15px;
        float: left;
        background: url(/images/delete.gif);
        margin: 0 22px 0 5px;
        cursor: pointer;
    }

    .liked-item h4 .edit {
        background: url(/images/edit.gif);
        width: 18px;
        height: 18px;
        margin: -2px 0 0 0;
    }

    .liked-item .group {
        margin: 4px 0 0 0;
        font-size: 8.6pt;
        color: #d78a02;
        float: right;
    }

    .custom-folders {
        position: relative;
    }

    .custom-folders input {
        font-size: 9pt;
        margin-top: -10px;
    }

    .save-name {
        padding: 4px 6px;
        background: #c7c7f3;
        font-size: 7.5pt;
        color: #000;
        display: none;
        position: absolute;
        bottom: 5px;
        left: 5px;
    }

    .delete-folder {
        padding: 4px 6px;
        background: #ee566b;
        font-size: 7.5pt;
        color: #000;
        display: none;
        position: absolute;
        bottom: 5px;
        left: 42px;
    }

</style>

<section id="favorite-list">

    <ul>
        <li class="all-folders active" onclick="showFavorites(0);">
            <a>
                <img src="/images/folder-documents-all.png">
                <p>
                    همه پوشه ها
                </p>
            </a>
        </li>

        @foreach($folders as $folder)
            <li class="custom-folders" onclick="showFavorites({{ $folder->id }});">
                <a>
                    <img src="/images/folder-documents-all.png">
                    <p>{{ $folder->title }}</p>
                    <i class="edit-icon" onclick="editFolder(this);"></i>
                    <span class="save-name" onclick="saveFolderName(this , {{ $folder->id }});">ذخیره</span>
                    <span class="delete-folder" onclick="deleteFavorite({{ $folder->id }}, this);">حذف</span>
                </a>
            </li>
        @endforeach

    </ul>

    <div class="items"></div>

</section>

<script>

    $('.all-folders').trigger('click');

    /*Favorite List*/

    var favListFolder = $('#favorite-list').find('ul li');

    favListFolder.click(function () {

        favListFolder.removeClass('active');
        $(this).addClass('active');
    });

    favListFolder.hover(function () {

        $('i', this).fadeIn(0);

    }, function () {

        $('i', this).fadeOut(0);
    });

    /*Show the Favorite List By click on the Folders*/

    function showFavorites(folderID) {

        var url = '/profile/favorites/' + folderID;
        var data = {};
        $('.items').html('');

        $.post(url, data, function (msg) {
            $.each(msg, function (index, val) {

                var likedItem = '<div class="liked-item"><a href="/product/' + val['product_id'] + '"><span class="image"><img src="/images/products/' + val['product_id'] + '/product-' + val['product_id'] + '.jpg"></span></a><h4>' + val['product_title'] + '<i class="delete" onclick="deleteFavorite(' + val['id'] + ' , this);"></i></h4><p class="group"></p></div>';

                $('.items').append(likedItem);
            });

        }, 'json');
    }

    /*Edit Favorite's Folder Name*/

    function editFolder(tag) {

        var icon = $(tag);
        var folder = icon.parents('.custom-folders');
        var title = folder.find('p').text();
        var input = '<input type="text" value="' + title + '">';

        folder.find('p').html(input);
        folder.find('.save-name').fadeIn(0);
        folder.find('.delete-folder').fadeIn(0);

        $('.custom-folders input').click(function (e) {
            e.stopPropagation();
        });
    }

    favListFolder.find('i').click(function () {

        $(this).fadeOut();
    });

    $('.edit-icon').click(function (e) {
        e.stopPropagation();
    });

    $('.save-name').click(function (e) {
        e.stopPropagation();
    });

    $('.delete-folder').click(function (e) {
        e.stopPropagation();
    });

    /*Add & Remove Edit Icon*/

    /*Save Changes of Folder Name*/

    function saveFolderName(tag, folderID) {

        var btn = $(tag);
        var deleteBtn = $(tag).parents('li').find('.delete-folder');
        var folder = btn.parents('.custom-folders');
        var title = folder.find('input').val();
        folder.find('p').html(title);
        btn.fadeOut(0);
        deleteBtn.fadeOut(0);

        var url = '/profile/favorites/change-folder/' + folderID;
        var data = {'title': title};
        $.post(url, data, function (msg) {
            if (msg !== '') {
                alert(msg);
            }
        });
    }

    function deleteFavorite(favoriteID, tag) {
        var url = '/profile/favorites/delete/' + favoriteID;
        var data = {};

        var item = $(tag).parents('.liked-item');
        var folder = $(tag).parents('.custom-folders');

        $.post(url, data, function (msg) {
            if (msg === 'folder') {
                folder.remove();
                window.location = '/profile?activeTab=favorites#tab';
            } else if (msg === '') {
                item.remove();
            }
        });
    }

</script>
