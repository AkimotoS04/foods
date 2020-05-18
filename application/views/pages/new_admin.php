<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<br>
    <?php 
    foreach($users as $u){
        echo'<a class="btn btn-primary fs-food-page" role="button" href="/foods/users/view_cv/?id=';echo($u['id']);echo '">'; 
        echo'View Details';
        echo '</a>';
        echo "<h4>"; 
        echo($u['name']); 
        echo "</h4>";

        echo "<small>"; 
        echo ($u['email']);
        echo"</small>";
        echo "<br>";
        echo "<hr>";
        echo "<br>";
    }
    ?>

</div>