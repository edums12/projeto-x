<div class="main">
    <center>
        <div class="section"></div>
        <h5 class="indigo-text">Edit Class!</h5>
        <div class="section"></div>

        <div class="container">
            <div class="row">
                <div class="z-depth-1 grey lighten-4 col s6 push-s3" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <form method="POST" action="<?= base_url("ClassController/editClassForm")?>">
                        <input type="hidden" value="<?= $class->id_class?>" name="id">
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='name' id='name' value="<?= $class->name_class?>"/>
                                <label for='name'>Name Class</label>
                            </div>
                        </div>
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Done</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </center>
</div>