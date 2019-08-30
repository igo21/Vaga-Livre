<div class="main">
    <h1>VAGA LIVRE</h1>
<div class="container">

    <div class="col-sm-12 col-md-12 col-xl-12 text-center">
        <h2>Lista de Vagas</h2>
        <hr>
    </div>
    <?php
    if(isset($_GET['excluido'])){
        ?>
        <div class="form-group">
            <?php
            $msg = "Vaga excluida com sucesso!";
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $msg?>
            </div>
        </div>
    <?php }elseif(isset($_GET['atualizado'])){
        ?>
        <div class="form-group">
            <?php
            $msg = "Vaga atualizada com sucesso!";
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $msg?>
            </div>
        </div>
    <?php }
    ?>
    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="row">
            <label class="col-sm-12 col-md-3 col-xl-3 text-right" for="nome"><h2>Buscar Vagas:</h2></label>
            <input type="text" name="nome"
                   class="form-control<?php if (isset($_GET["erro"])) echo ' is-invalid' ?> col-sm-12 col-md-6 col-xl-6"
                   id="nome" placeholder="Digite o nome que deseja buscar">
        </div>
    </div>
    <br>
    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="table-responsive">
            <?php require_once "tabela_vaga.php"; ?>
        </div>
    </div>

<br>
    <div class="col-sm-1 col-md-1 col-xl-1">
        <a href="index.php?view=cadvaga">
            <button type="button" class="btn btn-danger">
                Voltar
            </button>
        </a>
    </div>

</div>
</div>
<script>
    $("#nome").quicksearch("#tabela tbody tr");
</script>