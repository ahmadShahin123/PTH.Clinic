<div class="profile">
    <div class="avatar">
        <?php if(isset($_SESSION['avatar']) && $_SESSION['avatar'] != ''){ ?>
        <img src="<?php echo base_url() . 'assets/images/' . $_SESSION['avatar']; ?>" />
             <?php }
        else { ?>
        <img src="<?php echo base_url() . 'assets/images/avatar.png';?>" />
    <?php } ?>
        <form action="<?php echo base_url() . 'index.php/regular_user/avatar/' . $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" value="اختيار صورة" />
            <input type="submit" name="upload" value="تغيير الصورة" />
        </form>
    </div>
    <div class=""user_info>
        <p><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . $_SESSION['id']; ?></p>
    </div>
</div>