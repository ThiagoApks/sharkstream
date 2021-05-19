<?php 
if(isset($_GET['usuario']) && isset($_GET['senha']))
{
    if(mysqli_num_rows($uquery) != 0)
    {
        header("Content-Type: audio/mpegurl");
        header("Content-Disposition: attachment; filename=sharkstream.m3u");
        echo '
#<________________________________________> Shark Stream <________________________________________>
#- Não compartilhe os links presentes nesta lista. Pois os mesmos sofrem alteração a cada 5 horas!
#- Caso você não tenha pago pela lista, por favor, contacte a equipe. (Dependendo da sua pessoa, pode até ganhar um acesso!)
#- Acesse nosso site para conhecer mais! www.'.$CONFIG['siteurl'].'
#<________________________________________________________________________________________________>
        ';
        echo "
#EXTM3U";

        while($row = mysqli_fetch_array($queryvideos)) 
        {
            echo '
#EXTINF:0 tvg-logo="'.$row['logovideo'].'" tvg-name="'.$row['nomevideo'].'" group-title="'.$row['nomecategoria'].'", '.$row['nomevideo'].'
            '.$row['urlvideo'].'
            ';
        }
        while($row = mysqli_fetch_array($querycanais)) 
        {
            echo '
#EXTINF:0 tvg-logo="'.$row['logocanal'].'" tvg-name="'.$row['nomecanal'].'" group-title="Canais", '.$row['nomecanal'].'
            '.$row['urlcanal'].'
            ';
        }
    } else {
        echo 'Opa, camarada!<br>Afim de ter uma lista IPTV massa, ou acesso à um painel de revendedor e receber uma graninha extra? Entre em contato conosco!';
    }
} else {
    echo 'Opa, camarada!<br>Afim de ter uma lista IPTV massa, ou acesso à um painel de revendedor e receber uma graninha extra? Entre em contato conosco!';
}
?>