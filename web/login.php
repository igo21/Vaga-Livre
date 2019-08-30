<div class="main">
    <h1>VAGA LIVRE</h1>
    <div class="container-center">
        <div class="main-info">



            <div class="form-center">
                <div class="top-text">
                    <h3>Login</h3>
                    <div class="clear"> </div>
                </div>
                <p class="tamanhotexto">Preencha os campos abaixo</p>
                <div class="account-center">
                    <form method="post" action="controle_login.php">
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
                                $msg = "Dados incorretos!";
                                ?>
                                <div style="color: #ff0000;" class="" role="alert">
                                    <?php echo $msg?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <input type="text" name="email" class="checkout name-center" placeholder="Email" maxlength="50">
                        <input type="password" name="senha" class="checkout name-center" placeholder="Senha" maxlength="20">
                        <input type="submit" class="tamanhobtn" value="Entrar" width="2">
                        <!-- latitude e longidtude -8.7481195!4d-63.8758662 -->
                    </form>
                </div>
            </div>

            <div class="clear"> </div>
        </div>
    </div>
</div>
<!--//main -->
