<h1 class="text-center">Saved product list</h1>
<?php $product = $model->getAll(); ?>

<table class="table table-bordered table-hover text-center">
    <tr>
        <th>ID</th>
        <th>URL</th>
        <th>Price(general)</th>
        <th>Price(UAH)</th>
    </tr> 
    <?php foreach ($product as $v): ?>
        <tr>
            <td><?php echo $v['id'] ?></td>
            <td><a href='<?php echo $v['url'] ?>'>Link</a></td>
            <td><?php echo $v['price_value'] ?></td>
            <td><?php echo $v['id'] ?></td>
        </tr> 
    <?php endforeach; ?>
</table>

