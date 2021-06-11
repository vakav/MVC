<?php
class tasklist_controller
{
    public function tasklist()
    {
        $model = new model();
        $model->add_tasks($_SESSION['user']['id'],$_POST['text_for_task'],$_POST['add_task']);
        $model->unready($_GET['upd_unready']);
        $model->ready($_GET['upd_ready']);
        $model->del_task($_GET['del_id_task']);
        $model->ready_all($_POST['ready_all'],$_SESSION['user']['id']);
        $model->remove_all($_SESSION['user']['id'],$_POST['remove_all']);
        $out = $model->out_tasks($_SESSION['user']['id']);
        
        include "tpl/tasklist_tpl.php";
    }
    

}

?>