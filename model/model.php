<?php
session_start();
class model extends pdoconnect{
    
        public function add_tasks($user_id,$text_for_task, $add_task)
		{
			
			if ($add_task) 
			{
				$text_for_task = htmlspecialchars($text_for_task, ENT_QUOTES, 'UTF-8');
				$str_add_task="INSERT INTO `tasks`(`user_id`, `description`, `created_at`, `status`) VALUES ('$user_id',:text_for_task,'1','0')";
				$add_task_prepare=$this->pdo->prepare($str_add_task);	
				$add_task_prepare->execute(['text_for_task' =>$text_for_task]);
			}
		}

		public function unready($upd_unready)
		{	
			$str_upd_task_unready="UPDATE `tasks` SET `status` = '0' WHERE `tasks`.`id` = '$upd_unready'";
			$run_upd_task_unready=$this->pdo->query($str_upd_task_unready);	
		}
		public function ready($upd_ready)
		{	
			$str_upd_task_raedy="UPDATE `tasks` SET `status` = '1' WHERE `tasks`.`id` = '$upd_ready'";
			$run_upd_task_ready=$this->pdo->query($str_upd_task_raedy);		
		}
		public function del_task($del_id_task)
		{
			$str_del_task="DELETE FROM `tasks` WHERE `tasks`.`id` = '$del_id_task'";
			$run_del_task=$this->pdo->query($str_del_task);
		}
		public function ready_all($ready_all,$out_user_id)
		{
			if ($ready_all){
				$all_upd_ready="UPDATE `tasks` SET  `status`='1' WHERE `user_id`='$out_user_id'";
				$run_all_upd_ready=$this->pdo->query($all_upd_ready);
			}
		}
		public function remove_all($out_user_id,$remove_all)
		{
			if ($remove_all){
				$str_del_task="DELETE FROM `tasks` WHERE `tasks`.`user_id`='$out_user_id' ";
				$run_del_task=$this->pdo->query($str_del_task);
					
			}
		}
		public function out_tasks($out_user_id)
		{
			$str_out_task="SELECT * FROM `tasks` WHERE user_id='$out_user_id'";
			$run_out_task=$this->pdo->query($str_out_task);
			$out_task=$run_out_task;
			return $out_task;
		}


		public function log($auth_post,$login_post,$pass_post)
		{		
			if(isset($_SESSION['user'])){
				$link="1";
			}

			if(isset($auth_post)){

				if(!empty($login_post) && !empty($pass_post)){
					$login=htmlspecialchars($login_post);

					$password=htmlspecialchars($pass_post);

					$password = md5($password);
					$query =("SELECT * FROM `users` WHERE login=:login");
					$auth_query=$this->pdo->prepare($query);
					$auth_query->execute(['login' =>$login]);
					$true_user_login = $auth_query->rowCount();
					$query =("SELECT * FROM `users` WHERE login=:login AND password=:password");
					$auth_query=$this->pdo->prepare($query);
					$auth_query->execute(['login' =>$login, 'password'=>$password]);
					$true_user = $auth_query->rowCount();
					$out_user =  $auth_query->fetch();

				  	if($true_user_login==1){
						if ($true_user==1) {
							$_SESSION['user'] = ["id" => $out_user['id']];	 
						$link = "2";

						}else{
							$_SESSION['message']='ошибка';
						}
					}else{
						$login=htmlspecialchars($login_post);
						$password=htmlspecialchars($pass_post);
						$password = md5($password);
						$regis="INSERT INTO `users`(`login`, `password`, `created_at`) VALUES (:login,:password,'1')";
						$register= $this->pdo->prepare($regis);
						$register->execute(['login' =>$login, 'password'=>$password]);

						if ($register){
							$query=("SELECT * FROM `users` WHERE login=:login AND password=:password");
							$auth_user= $this->pdo->prepare($query);
							$auth_user->execute(['login' =>$login, 'password'=>$password]);
							$true_user=$auth_user->rowCount();
							$out_user=$auth_user->fetch();
							$_SESSION['user'] = [
				 			"id" => $out_user['id']];	 
				 			$link = "4";
						}
					}	
					
				}else{		
					echo  "Invalid username or password!";
				}
			}	
			return $link;
		}



}






?>