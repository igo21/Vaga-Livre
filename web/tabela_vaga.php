<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<table id="tabela" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th class="thh">Nome</th>
        <th class="thh">Latitude</th>
        <th class="thh">Longitude</th>
        <th class="thh">Disponível</th>
        <th class="thh">Opção</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once "Vaga.php";
    $vaga = Vaga::listarVaga();
    if(is_null($vaga)){
        echo "<tr></tr>";
    }else{
        foreach ($vaga as $v){
            ?>

            <tr>
                <td class="font-weight-bold"><?php echo $v['nome'];?></td>
                <td class="font-weight-bold"><?php echo $v['latitude'];?></td>
                <td class="font-weight-bold"><?php echo $v['longitude'];?></td>
            <?php if($v['disponivel'] == "s"){ ?>
                <td class="table-success font-weight-bold"><?php echo $v['disponivel'];?></td>
            <?php }elseif($v['disponivel'] == "n") {?>
                <td class="table-danger font-weight-bold"><?php echo $v['disponivel'];?></td>
            <?php } ?>
                <td>
                    <div class="form-inline">
                        <div class="col-sm-6 col-md-6 col-xl-6">
                            <a class="text-decoration-none" href="index.php?view=cadvaga&id=<?php echo$v['id'];?>"> <button class="btn btn-primary text-center" type="button">Editar</button></a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-6">
                            <a class="text-decoration-none" href="index.php?view=controle_cad_vaga&id=<?php echo$v['id'];?>&exclui"> <button class="btn btn-danger text-center" type="button">Excluir</button></a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>