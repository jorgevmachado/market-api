<table cellpadding="10">
    <tr class="thead">
        <th>Nome</th>
        <th>Sobrenome</th>
    </tr>
    <tbody>
    <?php
    foreach ($collection as $item) {

        echo '<tr>';
        echo "<td>{$item['nome']}</td>";
        echo "<td>{$item['sobrenome']}</td>";
        echo '</tr>';
    }
    ?>
    </tbody>
    <tfoot>
    {{--linha em branco--}}
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
        <td style="text-align: right">Quantidade:</td>
        <td>{{count($collection)}}</td>
    </tr>
    </tfoot>

</table>