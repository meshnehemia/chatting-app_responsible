<?php 
    require_once('config.php');
    $sql = mysqli_query($conn,'SELECT * FROM profiles');
    $output_users ="";
    if(mysqli_num_rows($sql)>0){
        while($row=mysqli_fetch_assoc($sql)){
                $output_users .=' <a href="" class="list">
                <div class="user">
                    <div class="images">
                        <img src="'.$row['image'].'" alt="profile image">
                        <div class="online"></div>
                    </div>
                    <div class="devide">
                        <div class="details">
                            <span>"'.$row['fname']." ".$row['lname'].'"</span>
                            <p>this is the text message</p>
                            <input type="text" style="display: none;" value = "'.$row['id'].'">
                        </div>
                        <div class="status">
                            <span >'.$row['status'].'</span>
                            <p>2</p>
                        </div>
                    </div>
                </div>
            </a>
            ';
        }
    }else{
        echo 'no users available';
    }
    echo $output_users;
?>