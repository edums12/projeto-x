<style>
    .card .card-image img{height:170px;}
</style>

<div class="main">
    <br>
    <div class="container">
        <div class="row">
            <?php for($i = 0; $i < count($classes); $i++){?>
            <div class="col s12 m4">
                <a href="<?= base_url("ClassControllerStudent/openTheClass/".$classes[$i]->id_class)?>" class="grey-text text-darken-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $classes[$i]->cover_bg?>">
                            <span class="card-title"><?= $classes[$i]->name_class?></span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action valign-wrapper">
                        <a href="<?= base_url("ClassControllerStudent/openTheClass/".$classes[$i]->id_class)?>" class="indigo-text">Enter the class</a>
                        <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                    </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Settings<i class="material-icons right">close</i></span>
                            <p>
                                <a href="<?= base_url("ClassControllerStudent/deleteClass/".$classes[$i]->id_class)?>" class="text-indigo">leave the class</a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<!-- Modal Add Class -->
<div id="modalClass" class="modal col s3">
    <div class="modal-content">
        <center>
            <h5 class="indigo-text">Join class</h5>
            <form method="POST" action="<?= base_url("ClassControllerStudent/joinClass")?>">
                <div class='row'>
                    <div class='input-field col s12'>
                        <input class='validate' type='text' name='cod' id='cod' />
                        <label for='cod'>Code Class</label>
                    </div>
                </div>
        </center>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect btn grey darken-1">Cancel</a>
        <button type='submit' name='btn_join' class='col s12 btn waves-effect indigo'>Join</button>
    </div>
    </form>
</div>