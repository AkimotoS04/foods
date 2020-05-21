<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<h4>Nama    : <?php echo $admin[0]['name']; ?></h4>
<h4>Email   : <?php echo $admin[0]['email']; ?></h4>
<h4>Tanggal Berdiri   : <?php echo $admin[0]['Birth']; ?></h4>
<h4>CV  : </h4>
<?php echo'<iframe src="'.base_url().$admin[0]['cv'].'" type="application/pdf" width="100%" height="600px" />'; ?></iframe>
<br/>
<br/>
<a class="btn btn-success fs-food-page" role="button" href="/foods/users/accept_admin/?id=<?php echo($admin[0]['id']); ?>"> Accept </a>
<a class="btn btn-danger fs-food-page" role="button" href="/foods/users/delete_user/?id=<?php echo($admin[0]['id']); ?>">Reject</a>
<br/>
</div>
