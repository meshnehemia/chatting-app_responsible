<?php 
        global $conn;
        require_once('config.php');
        $user_id = mysqli_real_escape_string($conn,$_POST['user']);
        $client_id = mysqli_real_escape_string($conn,$_POST['client']);
        $sql = 'CREATE TABLE IF NOT EXISTS chats(
            id INT AUTO_INCREMENT,
            sender VARCHAR(15),
            receiver VARCHAR(15),
            message VARCHAR(100),
            time varchar(20),
            PRIMARY KEY (id)
            );';
        mysqli_query($conn,$sql);

        $sql ="SELECT * FROM chats WHERE (sender ='$user_id' and receiver='$client_id') OR  (sender ='$client_id' and receiver='$user_id') ORDER BY id ASC";
        $chat ='';
        $result =mysqli_query($conn,$sql);
        $sql2 ="SELECT image FROM profiles WHERE id={$client_id}";
        $img = mysqli_query($conn,$sql2);
        $image = mysqli_fetch_assoc($img);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                if($row['sender'] === $user_id){
                    $chat .='<div class="outgoing d-flex justify-content-end text-white">
                                 <div class="details bg-dark p-2 mt-2">
                                     <p class="m-auto">'.$row['message'].'</p>
                                 </div>
                            </div>';
                }else{
                    $chat .='<div class="incoming d-flex mt-3">
                                <img src="'.$image['image'].'" class="rounded-circle chat-img" alt="">
                                <div class="details bg-white shadow-lg px-3 mx-2 mt-2">
                                    <p>'.$row['message'].'</p>
                                </div>
                            </div>';

                }
            }
        }else{
                $chat= '<div class="text-center bg-success">no messages found start conversation';
        }
        echo $chat;
?>