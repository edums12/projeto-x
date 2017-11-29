<div class="main">
    <center>
        <div class="section"></div>
        <h5 class="indigo-text">Create Home Work!</h5>
        <div class="section"></div>

        <div class="container">
            <div class="row">
                <div class="z-depth-1 grey lighten-4 col s8 push-s2" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <form method="POST" action="<?= base_url("WorkControllerTeacher/createWork")?>">
                        <div class="row">
                            <div class="col s12">
                                <select name="class_id_class" id="">
                                    <option value="" selected disabled>Chose class</option>
                                    <?php foreach($classes as $class){?>
                                    <option value="<?= $class->id_class?>"><?= $class->name_class?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='title_work' id='title_work' />
                                <label for='title_work'>Title Work</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea" name="description_work"></textarea>
                                <label for="textarea1">Textarea</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="dateSend_work" class="datepicker" id="date">
                                <label for="date">date of delivery of the home-work</label>
                            </div>
                        </div>
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Publish Work</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </center>
</div>