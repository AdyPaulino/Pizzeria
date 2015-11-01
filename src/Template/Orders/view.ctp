<!-- File: src/Template/Orders/view.ctp -->

<table>
    <tr>
        <th>Id</th>
        <th>Pizza size</th>
        <th>Actions</th>
    </tr>
    <tr>
        <td><?= $order->id ?></td>
        <td><?= $order->pizzaSize?></td>
        <td>
            <?= $this->Html->link('Mark as completed', ['action' => 'complete', $order->id]) ?>
        </td>
    </tr>
</table>