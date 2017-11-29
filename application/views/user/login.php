<main>
    <center>
        <div class="section"></div>

        <h5 class="indigo-text">Please, login into your account</h5>
        <div class="section"></div>

        <div class="container row">
            <div class="z-depth-1 grey lighten-4 col s6 push-s3" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                <form class="col s12" method="post" action="<?=base_url("LoginController/access")?>">
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='email' name='email' id='email' />
                            <label for='email'>Enter your email</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' />
                            <label for='password'>Enter your password</label>
                        </div>
                    </div>

                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
        <a href="<?= base_url("LoginController/createAcountView")?>">Create account</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
</main>