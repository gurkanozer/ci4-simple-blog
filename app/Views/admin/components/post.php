<tr>
    <th class="text-center" scope="row"><?= $post->id ?></th>
    <td class="text-center">
        <p><strong><?= strip_tags($post->title) ?></strong></p>
        <p><?= strip_tags($post->sub_title) ?></p>
    </td>
    <td class="text-center"><img src="<?= get_image($post->img, "exsm", "posts") ?>"></td>
    <td class="text-center">
        <input 
        type="checkbox" 
        class="is-active" 
        data-url="is_active/<?= $post->id ?>"
        <?= ($post->is_active == true) ? "checked" : "" ?> 
        data-toggle="toggle" 
        data-on="Açık" 
        data-off="Kapalı" 
        data-onstyle="primary" 
        data-offstyle="danger" 
        data-size="small">
    </td>
    <td class="text-center">
        <div class="btn-group " role="group">
            <a class="btn btn-sm btn-warning " href="update/<?= $post->id ?>" ><i class="fa fa-edit"></i></a>
            <button 
            type="button" 
            class="btn btn-sm btn-danger remove-item-btn"
            data-url='delete'
            data-id=<?= $post->id ?>
           ><i class="fa fa-trash"></i></button>
        </div>
    </td>
</tr>