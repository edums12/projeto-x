<div class="main">
    <center>
        <div class="section"></div>
        <h5 class="indigo-text">Create Class!</h5>
        <div class="section"></div>

        <div class="container">
            <div class="row">
                <div class="z-depth-1 grey lighten-4 col s6 push-s3" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <form method="POST" action="<?= base_url("ClassController/createClass")?>" enctype="multipart/form-data">
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='name' id='name' />
                                <label for='name'>Name Class</label>
                            </div>
                        </div>

                        <div class="row">
                            <label for="">Please, chose a photo for the background cover to the class!</label>
                            <div class="file-field input-field">
                                <div class="btn indigo">
                                    <span><i class="material-icons white-text">insert_photo</i></span>
                                    <input type="file" name="cover_bg">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>

                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Create Class</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </center>
</div>