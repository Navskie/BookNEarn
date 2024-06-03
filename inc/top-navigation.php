<!-- loader -->
<div class="loader">
    <div class="loader-body">
        <i class='bx bx-loader-alt bx-spin'></i>
        <span>Loading</span>            
    </div>
</div>

<section class="main-top-nav">
    <div class="top-nav-body container">
        <div class="details">
            <span><i class="ri-mail-line"></i> sample@gmail.com</span> <span class="top-separator">|</span>
            <span><i class="ri-phone-line"></i> 0963-5559868</span>
        </div>

        <!-- <div class="announcements">
            Sample Announcement
        </div> -->

        <div class="links">
            <?php 
                if ($token == "") 
                {
            ?>
                <a href="login" class="top-link"><i class="ri-user-line"></i> Signin</a> <span class="top-separator">|</span>
                <a href="register" class="top-link"><i class="ri-user-line"></i> Signup</a>
            <?php
                }
                elseif ($admin == 'TRUE' && $token != '') 
                {
            ?>
                <a href="admin/index" class="top-link"><i class="fa-solid fa-repeat"></i> Administrator</a> <span class="top-separator">|</span>
                <a href="logout" class="top-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> 
            <?php
                }
                else 
                {
            ?>
                <a href="profile" class="top-link"><i class="fa-solid fa-repeat"></i> Switch to Host</a> <span class="top-separator">|</span>
                <a href="profile" class="top-link"><i class="fa-solid fa-user-large"></i> Profile</a> <span class="top-separator">|</span>
                <a href="logout" class="top-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> 
            <?php
                }
            ?>
        </div>
    </div>
</section>