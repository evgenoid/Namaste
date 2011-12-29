<tr>
    <th>
        <?php echo 'Фото '.intval($num+1); ?>
    </th>
    <td>
        <table>
            <tbody>
            <?php echo $form['photos'][$num]['filename']->renderRow();?>
            <?php echo $form['photos'][$num]['uk']->renderRow();?>
            <?php echo $form['photos'][$num]['ru']->renderRow();?>
            <?php echo $form['photos'][$num]['id']->render()?>
            </tbody>
        </table>
    </td>
</tr>