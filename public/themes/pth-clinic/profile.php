
<div class="profile">
    <div class="avatar">
        <?php if(isset($_SESSION['avatar']) && $_SESSION['avatar'] != ''){ ?>
        <img src="<?php echo base_url() . 'assets/images/' . $_SESSION['avatar']; ?>" />
             <?php }
        else { ?>
        <img src="<?php echo base_url() . 'assets/images/avatar.png';?>" />
    <?php } ?>
        <form action="<?php echo base_url() . 'index.php/regular_user/avatar/' . $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="profile-form">
			<input type="file" name="avatar" value="اختيار صورة" />
			
            <input type="submit" name="upload" value="تغيير الصورة" />
			</div>
	   </form>
    </div>
    <div class="">
        <p><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . $_SESSION['id']; ?></p>
        <p class="profilelink"><a href="<?php echo site_url() . '/q_and_a/myqa/' . $_SESSION['id']; ?>">أسئلتي</a></p>
    </div>
	
</div>