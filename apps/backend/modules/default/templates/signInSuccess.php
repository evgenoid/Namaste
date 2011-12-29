<?php include_partial('flashes') ?>
<form action="<?php echo $sf_request->getUri() ?>" method="POST">
<table class="signin">
    <tbody>
        <?php echo $form ?>
        <tr>
            <td colspan="2">
                <input type="submit" value="Войти">
            </td>
        </tr>
    </tbody>
</table>
</form>
