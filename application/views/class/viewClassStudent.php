<style>
    .classViewCol{box-shadow:1px 1px 1.4px rgba(0,0,0,.3); margin-top:3em; margin-bottom: 3em;}
</style>

<div class="main grey lighten-4">
    <div class="background-cover valign-wrapper" style="background: url('../.<?= $class->cover_bg?>'); background-size:cover; height: 300px; background-attachment: fixed;">
        <h3 class="white-text" style="margin:0 auto;"><?= $class->name_class?></h3>
    </div>

    <div class="content" style="margin-top:2em">
        <div class="container">
            <?php foreach($workes as $work){?>
            <div class="row">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-content">
                            <span class="grey-text" style="font-size: 10pt;">Postaded <?= $work->dateCreation_work?></span>
                            <span class="card-title indigo-text"><?= $work->title_work?></span>
                            <span class="grey-text text-darken-4" style="font-size: 11pt;">Send to <?= $work->dateSend_work?></span>
                            <span class="card-title"><br></span>
                            <p class="grey lighten-3" style="padding:1em 1.5em"><?= $work->description_work?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

