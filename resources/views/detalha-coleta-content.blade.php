<div>
    <p><b>Coleta: </b> <?php echo $coleta->getId(); ?></p>
    <p><b>Lotação: </b> <?php echo $coleta->getLotacao()->getSigla(); ?></p>
    <p><b>Data da coleta: </b><?php echo $coleta->getDataColeta()->format('d/m/Y H:i:s'); ?></p>
</div>
<br/>

<?php
$total=0;
foreach ($collection as $tipo=>$materiais): ?>
<table cellpadding="10" style="margin-bottom: 40px">
    <caption>{{$tipo}}</caption>
    <thead>
        <tr class="thead">
            <th>Tipo</th>
            <th>Tombo</th>
            <th>Descrição</th>
            <th>Estado de Conservação</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $total = $total + count($materiais);
        /** @var \App\Entity\MaterialColeta $material */
    foreach ($materiais as $material) {
        $estado = \App\Entity\MaterialColeta::ESTADO_CONSERVACAO[$material->getEstadoConservacao()];
        $tipoTombo = $material->getTipoTombo() ? $material->getTipoTombo()->getDescricao(): '-';
        $Tombo = $material->getTombo() ? $material->getTipoTombo()->getId() . ' - ' .$material->getTombo() : '-';

        echo '<tr>';
        echo "<td>{$tipoTombo}</td>";
        echo "<td>{$Tombo}</td>";
        echo "<td>{$material->getDescricaoTombo()}</td>";
        echo "<td>{$estado}</td>";
        echo '</tr>';
    }
    ?>
        <tr class="totalizador">
            <td style="text-align: right">Quantidade:</td>
            <td style="text-align: left" colspan="3">{{count($materiais)}}</td>
        </tr>
    </tbody>
</table>

<?php endforeach; ?>

<div class="te">
    <p><b>Total geral de Bens Patrimoniais da Coleta Realizada: </b> {{$total}}</p>
</div>

