<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>TCC FÀCIL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="lib/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/select2/css/select2.css">
    <link rel="stylesheet" href="lib/DataTables-1.10.21/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="/lib/bootstrap/icons/bootstrap-icons.svg"> -->
    <!--<link rel="stylesheet" href="../lib/css/style.css">-->
    <link rel="stylesheet" href="lib/css/style-index.css">   
</head>
<body>
    <div class="main">
        <div class="container">
            <center>
                <div class="middle">
                    <div id="login">
                        <form class="formLogin">
                            <fieldset class="clearfix">
                                <p><span class="fa fa-user"></span><input type="text" name="email"
                                    id="email" Placeholder="E-mail" required></p>
                                    <p><span class="fa fa-lock"></span><input type="password" name="senha"
                                        id="senha" Placeholder="Senha" required></p>
                                        <div>
                                            <span style="width:48%; text-align:left;  display: inline-block;"><a
                                                class="small-text" href="javascript:void(0);">Esqueceu a senha?</a></span>
                                                <span style="width:50%; text-align:right;  display: inline-block;">
                                                    <button type="submit" class="btn btn-dark">Entrar</button>
                                                </div>                                
                                            </fieldset>
                                            <div class="clearfix">                          
                                            </div>
                                        </form>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="logo">
                                        <img src="img/logo.png" alt="" width="400px">
                                        <div class="clearfix"></div>
                                    </div>
                                </center>
                            </div>
                        </div>   
                        <script src="lib/jquery-3.4.1.min.js"></script>
                        <script src="lib/js/formataTable.js"></script>
                        <script src="lib/vanilla-masker.js"></script>
                        <script src="lib/alertifyjs/alertify.js"></script>
                        <script src="lib/notify.js"></script>
                        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
                        <script src="lib/select2/js/select2.js"></script>
                        <script src="lib/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>                  
                        <script type="text/javascript">
                            $(document).ready(function() {        
                                $('.formLogin').submit(function() {
                                    dados = $('.formLogin').serialize();
                                    $.ajax({
                                        type: "POST",
                                        data: dados,
                                        url: "procedimentos/login/logar.php",
                                        cache:false,
                                        success: function(r) {
                                           if(r == 'OK'){
                                              window.location.href = "view/principal.php";
                                          }else{
                                              $.notify(r, "error");
                                          }                    
                                      }
                                  })
                                    return false;
                                });
                            });
                        </script>
                    </body>  
                    </html>              

