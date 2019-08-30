<div class="main">
    <h1>VAGA LIVRE</h1>
    <div class="container-center">
        <div class="main-info">

            <div class="form-center">
                <div class="top-text">
                    <h2 class="menos">Cadastrar Uma Vaga</h2>
                    <div class="clear"> </div>
                </div>
                <p class="tamanhotexto">Preencha os campos abaixo</p>
                <div class="account-center">
                    <form method="get" action="controle_cad_vaga.php">
                        <?php
                        if(isset($_GET['ins'])){
                            ?>
                            <div class="form-group">
                                <?php
                                $msg = "Vaga inserida com sucesso!";
                                ?>
                                <div style="color: #00ff00" class="" role="alert">
                                    <?php echo $msg?>
                                </div>
                            </div>
                        <?php }elseif(isset($_GET['ins2'])) {
                            ?>
                            <div class="form-group">
                                <?php
                                $msg = "Vaga já inserida!";
                                ?>
                                <div style="color: #ff0000;" class="" role="alert">
                                    <?php echo $msg?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if(isset($_GET['id'])){
                        $va = null;
                        require_once "Vaga.php";
                        $va = Vaga::seleciona($_GET['id']);

                        ?>
                        <input type="text" hidden="hidden" name="nome" value="<?php echo $va->getNome()?>">
                        <label class="checkout tamanhotexto" ><?php echo $va->getNome()?></label>
                        <input type="text" name="latitude" class="checkout name-center" value="<?php echo $va->getLatitude()?>" placeholder="Latidude" maxlength="20">
                        <input type="text" name="longitude" class="checkout name-center" value="<?php echo $va->getLongitude()?>" placeholder="Longitude" maxlength="20">
                        <a href="#"><button name="idedit" type="submit" class="tamanhobtn2" value="<?php echo $va->getId();?>" width="2">Atualizar</button></a>
                        <!-- latitude e longidtude -8.7481195!4d-63.8758662 -->
                        <?php }else{?>
                        <input type="text" name="nome" class="checkout name-center" placeholder="Nome">
                        <input type="text" name="latitude" class="checkout name-center" placeholder="Latidude" maxlength="20">
                        <input type="text" name="longitude" class="checkout name-center" placeholder="Longitude" maxlength="20">
                        <input type="submit" class="tamanhobtn" value="Cadastrar" width="2">
                        <!-- latitude e longidtude -8.7481195!4d-63.8758662 -->
                        <?php } ?>
                    </form>
                    <a class="tamanhobtn" href="index.php?view=listar_vaga"><button>Listar</button></a>
                </div>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<!--//main -->
	