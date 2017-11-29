<style>
    .classViewCol{box-shadow:1px 1px 1.4px rgba(0,0,0,.3); margin-top:3em; margin-bottom: 3em;}
</style>

<div class="main grey lighten-4" style="padding-bottom: 40px;">
    <div class="background-cover valign-wrapper" style="background: url('../.<?= $class->cover_bg?>'); background-size:cover; height: 300px; background-attachment: fixed;">
        <h3 class="white-text" style="margin:0 auto;"><?= $class->name_class?></h3>
    </div>

    <div class="content" style="margin-top:2em">
        <div class="container">
            <div class="row">
                <div class="z-depth-1 white col s12 m12" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <h3>STUDENTS</h3>
                    <table class="">
                        <thead>
                            <th>Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach($students as $student){?>
                            <tr>
                                <td><?= $student->name_user?></td>
                                <td><a href="<?= base_url("ClassController/deleteStudent/".$student->id_user."/".$class->id_class)?>" class="tooltipped delete" onclick="return confirm('Are you sure you want to delete the student <?= $student->name_user?>?')"><div class="material-icons">delete</div></a></td>
                            </tr>
                            <?php }?>
                        </tbody>      
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

