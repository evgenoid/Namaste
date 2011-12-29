<tr>
    <th>
        <?php echo 'Фото '.intval($num+1); ?>
    </th>
    <td>
        <table>
            <tbody>
            <?php echo $form['showcases'][$num]['filename']->renderRow();?>
            <?php echo $form['showcases'][$num]['uk']->renderRow();?>
            <?php echo $form['showcases'][$num]['ru']->renderRow();?>
            <?php echo $form['showcases'][$num]['id']->render()?>
            </tbody>
        </table>
    </td>
</tr>