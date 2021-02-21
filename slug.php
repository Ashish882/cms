<?php 


global $Connectingdb;
$searchid = $_GET['id']);
        $sql ="UPDATE post SET slug=:slugss WHERE id='$searchid'";
        $stmt= $Connectingdb->prepare($sql);
        $stmt->bindValue(':slugss',$slug);
        $excute=$stmt->execute();
        if($excute){

            $sql="SELECT slug from post where id='$searchid'"
            $stmt= $Connectingdb->query($sql);
            $slug=$stmt->fetch();


        }
        
        else {
        
        }

        ?>