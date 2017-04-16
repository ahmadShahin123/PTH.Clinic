<?php echo theme_view('header_inner'); ?>

<div class="bmidivtext"><span class="bmispan">مؤشر كتلة الجسم</span>  هو أفضل مقياس متعارف عليه عالميا في القياسات الجسمية  لتمييز الوزن الزائد عن السمنة أو البدانة عن النحافة عن الوزن المثالى، وهو يعبر عن العلاقة بين وزن الشخص وطوله. وهو حاصل على اعتراف المعهد القومي الأمريكي للصحة ومنظمة الصحة العالمية كأفضل معيار لقياس السمنة. و يحسب مؤشر كتلة الجسم بتقسيم الوزن بالكيلوجرام على مربع الطول بالمتر كما يلي<br/>
    <b>مؤشر كتلة الجسم = الوزن بالكيلوجرام/مربع الطول بالمتر  </b>
    <br/>و بعد حسابه قارن النتيجة بالجدول التالي
</div>

<div class="bmidiv">
    <div class="bmiform">
        <b>أدخل البيانات المطلوبة</b>
        <form  action="<?php echo site_url() . '/excercises/bmi'; ?>" method="post" >

            الوزن:<input class="bmifont" type="text" placeholder="أدخل الوزن بالكيلو غرام" name="weight" value="<?php isset($_POST['weight']) ? $_POST['weight'] : '' ?>"/>
            الطول:<input class="bmifont" type="text" placeholder="أدخل الطول بالمتر" name="height" value="<?php isset($_POST['height']) ? $_POST['height'] : '' ?>"/>

            مؤشر كتلة الجسم:<input class="bmifont" type="text" placeholder="النتيجة" name="bmi" align="center"	value="<?php echo isset($_POST['bmi']) ? $_POST['bmi'] : ''; ?>"/>

            <div class="bmidivbtn">
                <input class="bmibutton" type="submit" name="bmisubmit" value="احسب" align="center">
                <input class="bmicancelbtn" type="reset" name="bmireset" value="تفريغ الحقول" align="center">
            </div>
        </form>
    </div>


    <table class="bmitable">
        <tr>
            <th>التصنيف</th>
            <th>مؤشر كتلة الجسم – كغ/م<sup>2</sup></th>
        </tr>
        <tr>
            <td>نحافة شديدة جدا</td>
            <td>أقل من 15</td>
        </tr>
        <tr>
            <td>نحافة شديدة</td>
            <td>من 15 إلى 16</td>
        </tr>
        <tr>
            <td>نقص في الوزن</td>
            <td>من 16 إلى 18.5</td>
        </tr>
        <tr>
            <td>وزن طبيعي</td>
            <td>من 18.5 إلى 25</td>
        </tr>
        <tr>
            <td>زيادة في الوزن</td>
            <td>من 25 إلى 30</td>
        </tr>
        <tr>
            <td>سمنة خفيفة (سمنة من الدرجة الأولى)</td>
            <td>من 30 إلى 35</td>
        </tr>
        <tr>
            <td>سمنة متوسطة (سمنة من الدرجة الثانية)</td>
            <td>من 35 إلى 40</td>
        </tr>
        <tr>
            <td>سمنة مفرطة (سمنة من الدرجة الثالثة)</td>
            <td>أكثر من 40</td>
        </tr>
    </table>


</div>
</body>

</html>