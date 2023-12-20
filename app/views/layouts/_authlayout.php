<?php
 require APPROOT . '/views/inc/header.php';
 require APPROOT . '/views/inc/nav.php';
?>
<h1>test layout</h1>
    <main>
        <div class="background"></div>
        <div class="content">
            <?php echo $content ?>
        </div>
    </main>
<?php
    require APPROOT . '/views/inc/footer.php';
?>
