<div class="main">
    <div class="container">
        <center>
            <div class="section"></div>
            <h5 class="indigo-text">List Class!</h5>
            <div class="section"></div>

            
            <div class="row">
                <div class="z-depth-1 grey lighten-4 col s12" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <a style="float: left" href="<?= base_url("ClassController/addClass")?>" class="btn waves-effect indigo">Create a class</a>
                    
                    <table class="">
                        <thead>
                            <th>Name Class</th>
                            <th>Code Class</th>
                            <th>Actions</th>
                        </thead>
                        <?php foreach($classes as $class){?>
                            <tbody>
                                <td><?= $class->name_class?></td>
                                <td><?= $class->number_class?></td>
                                <td>
                                    <a href="<?= base_url("ClassController/viewClass/$class->id_class")?>" class="tooltipped view"><div class="material-icons">remove_red_eye</div></a>
                                    <a href="<?= base_url("ClassController/editClass/$class->id_class")?>" class="tooltipped edit"><div class="material-icons">edit</div></a>
                                    <a href="<?= base_url("ClassController/deleteClass/$class->id_class")?>" class="tooltipped delete" onclick="return confirm('Are you sure you want to delete the class <?= $class->name_class?>?')"><div class="material-icons">delete</div></a>
                                </td>
                            </tbody>
                        <?php }?>
                    </table>
                </div>
            </div>
        </center>
    </div>
</div>