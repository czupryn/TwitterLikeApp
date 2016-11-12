<div>
    <h2>List of all tweets</h2>
    <?php foreach ($tweets as $tweet) { ?>
        <div class="tweet">
            <post>
                <p>User: <?php echo $tweet->getUser_id(); ?>.  
                <?php echo $tweet->getCreationDate(); ?></p>
                <p><?php echo $tweet->getMessage(); ?></p>
            </post>
        </div>
    <?php } ?>
</div>