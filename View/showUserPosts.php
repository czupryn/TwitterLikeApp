<div>
    <h2>List of User's tweets</h2>
    <?php foreach ($tweets as $tweet) { ?>
        <div class="tweet">
            <post>
                <p>User: <?php echo User::loadUsernameById($conn, $tweet->getUser_id()); ?> ( <?php echo $tweet->getCreationDate(); ?> )</p>
                <p><?php echo $tweet->getMessage(); ?></p>
            </post>
        </div>
    <?php } ?>
</div>