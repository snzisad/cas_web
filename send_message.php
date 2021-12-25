<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
	include 'core/notification_manager.php';
    session_start(); 
    // checkManager(); 

?>
	<style type="text/css">
		.message-wrapper {
		    position: relative;
		    overflow: hidden;
		    width: 100%;
		    margin: 8px 0;
		    padding: 8px 0;
		}

		.message-wrapper.me .circle-wrapper, .message-wrapper.me .text-wrapper {
		    background: #A3DDD3;

		    /*background: #607d8b;*/
		    
		    float: right;
		    /*color: #fff;*/
		    color: #414141;
		}

		.message-wrapper .circle-wrapper {
		    height: 38px;
		    width: 38px;
		    background: 0 0 !important;
		}

		.message-wrapper .circle-wrapper img {
		    height: 38px;
		    width: 38px;
		}
		.circle {
		    border-radius: 50%;
		}
		img {
		    border: 0;
		}

		.message-wrapper .text-wrapper {
		    padding: 10px;
		    min-height: 38px;
		    max-width: 60%;
		    margin: 0 10px;
		    box-shadow: 0 1px 2px rgba(0,0,0,.15);
		    position: relative;
		    font-size: 13px;
		    font-weight: 400;
		    line-height: 1.8;
		}


		.message-wrapper.them .circle-wrapper, .message-wrapper.them .text-wrapper {
		    background: #eceff1;
		    float: left;
		    color: #333;
		}
	</style>
<?php
	
	if(isset($_POST['msg'])){		
		$msg = addslashes($_POST['msg']);
		$id = $_POST['id'];
		$post_user_id = $_POST['post_user_id'];
		// $addChat = "insert into `chat` (chat_room_id, chat_msg, userid, chat_date) values ('$id', '$msg' , '".$_SESSION['userid']."', NOW())";
		$addChat = "insert into `chat` (chat_room_id, chat_msg, userid, chat_date) values ('$id', '$msg' , '".$_SESSION['uid']."', NOW())";
		$execChatQuery = query($addChat);
		$cid = insertID();
		
		if ($execChatQuery && $cid != 1) {

			$query = "SELECT * FROM post JOIN users ON post.userid = users.id WHERE post.id = $id LIMIT 1";
			$post = fetchData($query);

			$post_title = $post[0]['post_title'];
			$fcmID = $post[0]['firebase_id'];
			$adminID = $post[0]['id'];

			if ($fcmID && $uid != $adminID) {
				send_message_notification($id, $post_title, $msg, $fcmID);
			}

		}

		// header('location: message.php?uid='.$post_user_id.'&pid='.$id);
	}
?>
<?php
	if(isset($_POST['res'])){
		$id = $_POST['id'];
	?>
	<?php
		$selectChatRoom = "
                        select * from `chat` left join `users` on users.id=chat.userid where chat_room_id='$id' order by chat_date asc
                       ";
      	$record = fetchData($selectChatRoom);
      	foreach ($record as $data) 
    	{
    		if ($_SESSION['uid'] == $data['userid']) {
    ?>
    			<div class="message-wrapper me">
		            <div class="circle-wrapper">
		            	<img src="public/images/profile-image-3.jpg" class="circle" alt="">
		            </div>
		            <div class="text-wrapper">
		            	<?php echo date('h:i A',strtotime($data['chat_date'])); ?><br>
		            	<span class="status" id="<?php echo $data['userid']; ?>"></span>
		            	<?php echo $data['name']; ?>: <?php echo $data['chat_msg']; ?>
		            </div>
		        </div>
    <?php
    		} else {
    ?>
    			<div class="message-wrapper them">
		            <div class="circle-wrapper">
		            	<img src="public/images/profile-image.png" class="circle" alt="">
		            </div>
		            <div class="text-wrapper">
		            	<?php echo date('h:i A',strtotime($data['chat_date'])); ?><br>
		            	<span class="status" id="<?php echo $data['userid']; ?>"></span>
		            	<?php echo $data['name']; ?>: <?php echo $data['chat_msg']; ?>
		            </div>
		        </div>
    <?php
    		}    		
	?>	

		
		<!-- <div>
			
			<br>
		</div>  -->
		
		
		<br>
	<?php
		}
	}	
?>

<script type="text/javascript">
	var element = document.getElementById("result");
	element.scrollTop = element.scrollHeight;
</script>