<?php
    require APPROOT . '/views/inc/header.php';
    require APPROOT . '/views/inc/nav.php';
?>
    <main>
        <div class="background"></div>
        <div class="content">
            <div class="drac-box drac-bg-pink-purple drac-w-xl drac-rounded-lg">
                <h3 class="drac-heading drac-heading-lg drac-text-white">Welcome, ToDo Things</h3>
                <div class="btn-container">
                    <a href="/auth">
                        <button class="drac-btn drac-bg-cyan">
                            Log in
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </main>
<?php
    require APPROOT . '/views/inc/footer.php';
?>
