<tr>
    <th class="text-center" scope="row"><?= $category->id ?></th>
    <td class="text-center">
        <?= $category->title ?>
    </td>
    <td class="text-center">
        <input 
        type="checkbox" 
        class="is-active" 
        data-url="categories/is_active/<?= $category->id ?>"
        <?= ($category->is_active == true) ? "checked" : "" ?>
        data-toggle="toggle" 
        data-on="Açık" 
        data-off="Kapalı" 
        data-onstyle="primary" 
        data-offstyle="danger" 
        data-size="small">
    </td>
    <td class="text-center">
        <div class="btn-group" role="group">
            <button class="btn btn-sm btn-warning edit-item-btn" 
                    data-url="categories/update/<?= $category->id ?>" 
                    data-title="<?= $category->title ?>"
            ><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-sm btn-danger remove-item-btn"
                data-url='categories/delete'
                data-id=<?= $category->id ?>
                ><i class="fa fa-trash"></i></button>
        </div>
    </td>
</tr>