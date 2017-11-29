<div class="main">
    <center>
        <div class="section"></div>
        <h5 class="indigo-text">Works!</h5>
        <div class="section"></div>
    </center>
    <div class="container">
        <a href="<?= base_url("WorkControllerTeacher/addWork")?>" class="btn indigo">New Home Work</a>
        <div class="row">
            <ul class="collapsible" data-collapsible="accordion">
                <?php foreach($classes as $class){?>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">list</i>
                        <?= $class->name_class?>
                    </div>
                    <div class="collapsible-body">
                        <table class="bordered">
                            <?php $cont = 1;?>
                            <?php foreach($workes as $work){?>
                                <?php if($work->class_id_class == $class->id_class){?>
                                <tr>
                                    <td><?= $cont?></td>
                                    <td><?= $work->title_work?></td>
                                    <td>
                                        <a href=""><i class="material-icons">remove_red_eye</i></a>
                                        <a href=""><i class="material-icons">edit</i></a>
                                        <a href=""><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                                <?php $cont++; }?>
                            <?php }?>
                        </table>
                    </div>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>