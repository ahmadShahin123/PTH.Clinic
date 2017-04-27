<?php echo theme_view("header_inner"); ?>

<h3></h3>
<div class="container symp">



       <!-- <label for="country">العمر</label>
        <select>
            <option selected="selected">--select age group--</option>
            <option value="1">newborn  (0-28 days)</option>
            <option value="2">infant  (29 days-1 year)</option>
            <option value="3">younger child  (1-5 years)</option>
            <option value="10">older child  (6-12 years)</option>
            <option value="4">adolescent   (13-16 years)</option>
            <option value="7">young adult  (17-29 years)</option>
            <option value="5">adult  (30-39 years)</option>
            <option value="8">adult  (40-49 years)</option>
            <option value="9">adult  (50-64 years)</option>
            <option value="6">senior  (65 yrs-over)</option></select>

        <div class="search_sub" >
            الجنس:
            <input name="query[sex]"   value="1" type="radio">انثى
            &nbsp;&nbsp;
            <input name="query[sex]"   value="2" type="radio">ذكر
        </div>-->
        <br>
<?php if(isset($illnesses)){ ?>
        <label for="subject">المرض/الأمراض التالية قد تكون مصاب به/بها: </label>
        <div class="search_sub" >
            <ul>
            <?php $current_level = 'level' . $level; ?>
            <?php foreach($illnesses as $key=>$illness) { ?>
                <li><?php echo $illness->illness; ?>
                <?php if (isset($illness->complications) && $illness->complications != NULL) { ?>
                <ul class="complications">
                    <?php $comps = explode('،', $illness->complications);  echo 'المضاعفات: ';
                    foreach ($comps as $key=>$comp) { ?>
                    <li><?php echo $comp; ?> </li>
                    <?php } ?>
                </ul>
                    <?php } ?>
                    </li>
            <?php } ?>
            </ul>
            <div class="warning">
                <p>*الرجاء عدم اعتماد هذا التشخيص كتشخيص نهائي و مراجعة طبيب للحصول على نتيجة دقيقة</p>
                <?php foreach($illnesses as $key=>$illness) {
                    if(isset($illness->notes) && $illness->notes != NULL) {?>
                <p><?php echo $illness->notes; ?>**</p>
                <?php }
                } ?>
            </div>
        </div>

<?php }
else { ?>
    <form action="<?php echo site_url() . '/symptoms/sympt/' . $level; ?>" method="post" >
        <label for="subject">الأعراض: </label>
        <div class="search_sub" >
            <?php $current_level = 'level' . $level; ?>
        <?php foreach($symps as $key=>$symp) {
            ?>
            <input name="level"   value="<?php echo $symp->$current_level; ?>" type="radio"> <?php echo $symp->$current_level; ?>
            <br>
            <?php } ?>
        </div>

        <br>
        <input type="submit" value="تشخيص" name="send">
    </form>


<?php } ?>
</div>
<?php echo theme_view('footer'); ?>

