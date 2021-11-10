<?=form_open()?>
<table>
    <thead>
        <tr>
            <th colspan="2">Titulo</th>
            <th>Autor</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($libros as $libro) : ?>
            <tr>
                <td><input type="checkbox" name="<?=$libro->idlibro?>" id=""></td>
                <td><?=$libro->titulo?></td>
                <td><?=$libro->autor?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?=form_submit("Prestar", "Prestar")?>
<?=form_close()?>