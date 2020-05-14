<div class="jumbotron">
<h2>New Admin</h2>
<hr>
<br>
    <?php 
    foreach($users as $u){
        
        echo'<a class="btn btn-dark fs-food-page" role="button" href="/foods/users/accept_admin/?id=';echo($u['id']);echo '">'; 
        echo'Accept New Admin';
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