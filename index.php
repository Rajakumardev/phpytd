<?php
$url = "";
if(isset($_GET['videoUrl']) && !empty($_GET['videoUrl'])){
    $url = $_GET['videoUrl'];
    $id = substr($url,(strpos($url,"=")+1),strlen($url));
    parse_str(file_get_contents("http://youtube.com/get_video_info?video_id=".$id),$video_info);
    $links = $video_info['url_encoded_fmt_stream_map'];
    $links = explode(",",$links);
}
?>
<html>

    
    <head>
        <title>YTD by Codebolt</title>
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
    </head>


    <body>
        
        
        <div class="header">
            <h3>YTD</h3>
        </div>

        <div class="content">

            
            <div class="content-header">
                <form>
                    <table border=0>
                        <tr>
                            <td align="center">
                            <img src="img/download.png" width="50" height="50"/>
                            </td>
                            <td align=right>
                                <input type="url" placeholder="paste video link here !" name="videoUrl" value="<?php echo $url; ?>"/>
                            </td>
                            <td>
                                <input type="submit" value="SUBMIT" name="submit"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>


            <div class="content-body">
                <table border=0>
                <?php
                    if(isset($_GET['videoUrl']) && !empty($_GET['videoUrl'])){
                        echo '<tr><td colspan="2" align="left"><img src="'. $video_info['thumbnail_url'].'" width="250" height="200"/></td><td colspan="2"><h3>'. $video_info['title'].'</h3></td></tr>
                        <tr>';
                            foreach($links as $link){
                                parse_str($link,$data);
                                $type = explode(";",$data['type']);
                                echo '<td align="center"><a class="btn" href="'.$data['url'].'">'.$data['quality'].' ('.$type[0].') </a></td>';
    
                            }
                    }else{
                        echo '<td><info>Paste the link then click submit !</info></td>';
                    }
                    echo '</tr>';
                    ?>
                </table>
            </div>


        </div>

        <div class="footer">
            <h3>&copy; 2017</h3>
            <i>Created by Rajakumar Samuthirakani</i>
            <table border=0><tr>
                <td><a href="http://www.codebolt.blogspot.com/" target="_blank"><img src="img/blogger.png" width="50" height="50"></a></td>
                <td><a href="https://www.youtube.com/channel/UCERZyB3Muxt590fChRCnadg/" target="_blank"><img src="img/youtube.png" width="50" height="50"></a></td>
                <td><a href="https://play.google.com/store/apps/developer?id=Codebolt%20Studios&hl=en" target="_blank"><img src="img/playstore.png" width="50" height="50"></a></td>
                <td><a href="https://www.linkedin.com/in/raja-kumar-94190bb6/" target="_blank"><img src="img/linkedin.png" width="50" height="50"></a></td>
                <td><a href="mailto:rajakumarofficial@gmail.com"><img src="img/mail.png" width="50" height="50"></a></td>
            </tr></table>
        </div>
    </body>

</html>