<div>
    <h2>List of Users</h2>
    <?php foreach ($users as $user) { ?>
        <div class="foundUsers">
            <a href= "../Controller/userPage.php?User_id=<?php echo $user->getId(); ?>"><?php echo $user->getUsername(); ?> ( <?php echo $user->getEmail(); ?> )</a>
        </div>
    <?php } ?>
</div>