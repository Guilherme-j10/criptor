<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="theme-color" content="#111"> 
        <meta name="apple-mobile-web-app-status-bar-style" content="#111">
        <meta name="msapplication-navbutton-color" content="#111">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title; ?></title>
        <style>
            *{margin: 0px; font-family: Arial; padding: 0px; outline: none; box-sizing: border-box; font-weight: normal; text-decoration: none; border: none; list-style: none;}
        
            main{width: 100%; background-color: #111; min-height: 100vh; padding: 4%; display: flex; justify-content: flex-start; align-items: center; flex-direction: column;}
            main .header{width: 100%; margin-bottom: 70px; display: flex; justify-content: center; align-items: center; flex-direction: column;}
            main .header h1{font-weight: bold; color: #fff; margin-bottom: 20px; text-transform: uppercase; font-size: 1.3em; letter-spacing: 2px;}
            main .header small{color: #ccc; letter-spacing: 1px;}

            main form{width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;}
            main form textarea{width: 40%; background-color: #111; color: #fff; margin-bottom: 10px; height: 200px; padding: 2%; resize: none; border: solid 1px #ccc; border-radius: 5px;}
        
            @media(max-width: 380px){
                main{
                    height: auto;
                    padding: 5% 0%;
                }

                main .header{
                    margin-bottom: 20px;
                }

                main .header h1{
                    margin-bottom: 5px;
                }

                main form textarea{
                    width: 90%;
                }
            }

            @media(max-width: 414px){
                main{
                    height: auto;
                    padding: 5% 0%;
                }

                main .header{
                    margin-bottom: 20px;
                }

                main .header h1{
                    margin-bottom: 5px;
                }

                main form textarea{
                    width: 90%;
                }
            }
        </style>
    </head>
    <body>
        <main>
            <section class="header">
                <h1>gencriptor</h1>
                <small>Módulo de criptografia para a web</small>
            </section>
            <form method="POST">
                <textarea name="input" id="input_primary" placeholder="Digite seu texto dentro deste campo"></textarea>
                <textarea style="margin-bottom: 0px;" name="input" id="encode" disabled></textarea>
            </form>
        </main>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            setInterval(() => {
                let input = document.getElementById('input_primary').value;
                let input_encode = document.getElementById('encode');

                $.ajax({
                    url: "<?= SITE_NAME.'recived_data' ?>",
                    type: "POST",
                    data: "campo_um="+input,
                    dataType: "html"
                }).done(function(data){
                    input_encode.value = data
                }).fail(function(jqXHR, textStatus){
                    //console.log("Request failed: " + textStatus);
                }).always(function(){
                    //console.log('completou');
                })
            }, 100);
        </script>
    </body>
</html>