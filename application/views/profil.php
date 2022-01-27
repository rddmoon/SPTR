<section class="section">
    <div class="section-header">
        <h1>Profil</h1>
    </div>
    <div class="row">
        <div class="col-12 col-offset-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profil</h4>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <a href="<?=site_url('user/edit_profil/'.$current_user->id)?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Edit</a>
                    </div>
                    <?php if($current_user->role == "dirut_keuangan"){
                      $role = "dirut keuangan";
                    }
                    else {
                      $role = $current_user->role;
                    } ?>
                    <p>Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$current_user->username?></p>
                    <p>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=ucwords($current_user->nama)?></p>
                    <p>Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=ucwords($role)?></p>
                </div>
            </div>
        </div>
    </div>
</section>
