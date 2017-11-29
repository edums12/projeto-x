<main>
    <center>
        <div class="section"></div>

        <h5 class="indigo-text">Create your account!</h5>
        <div class="section"></div>

        <div class="container row ">
            <div class="z-depth-1 push-s3 grey lighten-4 col s6" style="padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                <form class="col s12" method="post" action="<?= base_url("LoginController/createUser")?>">
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='text' name='name' id='name' required/>
                            <label for='name'>Insert your name</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='email' name='email' id='email' required/>
                            <label for='email'>Insert your email</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' required/>
                            <label for='password'>Insert your password</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' id='confirmPassword' required/>
                            <label for='confirmPassword'>Confirm your password</label>
                        </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                        <select name="pro">
                            <option value="0">Student</option>
                            <option value="1">Teacher</option>
                        </select>
                    </div>
                    </div>
                    <br />
                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Create Account</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
</main>


<script>
    $(document).ready(function(){
        $('button[type=submit]').prop('disabled', true);
    });

    $('.validate[type=password]').keyup(function(){
        validPassword($('#password'), $('#confirmPassword'), $('button[type=submit]'));
    });
    
    var validPassword = function(password1, password2, field){
        if(password1.val() == password2.val() && password1.val() != "" && password2.val() != ""){
            field.prop('disabled', false);
        } else{
            field.prop('disabled', true);            
        }
    }
</script>