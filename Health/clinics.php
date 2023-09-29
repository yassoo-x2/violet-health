<?php
   ob_start();
   $pageTitle = 'log in' ;
   $nonavbar = '';
   include 'init.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visitDate = $_POST["visit_date"];
    $hospital = $_POST["hospital"];
    $clinic = $_POST["clinic"];
    $firstName = $_POST["first-name"];
    $fatherName = $_POST["father-name"];
    $lastName = $_POST["last-name"];
    $motherName = $_POST["mother-name"];
    $fullName = $_POST["full-name"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $documentType = $_POST["document-type"];
    $docnum = $_POST["doc_num"];
    $residencyStatus = $_POST["residency-status"];
    $originPlace = $_POST["origin-place"];
    $displacementPeriod = $_POST["displacement-period"];
    $maritalStatus = $_POST["marital-status"];
    $isPregnant = $_POST["is-pregnant"];
    $isBreastfeeding = $_POST["is-breastfeeding"];
    $phoneNumber = $_POST["phone-number"];
    $hasDisability = $_POST["has-disability"];

    // Step 4: Sanitize and validate the data (You should implement proper validation and sanitization)
    
    // Step 5: Construct and execute an SQL INSERT query
    $sql = "INSERT INTO clinics (visit_date, hospital, clinic, first_name, father_name, last_name, mother_name, full_name, birthdate, gender, document_type,document_num, residency_status, origin_place, displacement_period, marital_status, is_pregnant, is_breastfeeding, phone_number, has_disability) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
    $newreg = $con->prepare($sql);
    $newreg->execute([
        $visitDate,
        $hospital,
        $clinic,
        $firstName,
        $fatherName,
        $lastName,
        $motherName,
        $fullName,
        $birthdate,
        $gender,
        $documentType,
        $docnum, // Add the document number here
        $residencyStatus,
        $originPlace,
        $displacementPeriod,
        $maritalStatus,
        $isPregnant,
        $isBreastfeeding,
        $phoneNumber,
        $hasDisability
    ]);


}
try{
    $stmt = $con->prepare("SELECT COUNT(*) FROM clinics");
    $stmt->execute();
    // Fetch the count
    echo $rowCount = $stmt->fetchColumn();
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<div class="container">
    <h2>Personal Information Form</h2>
    <form id="personal-info-form" method="POST">
        <div class="form-group">
            <div class="input-box">
                <input type="date" id="visit_date" name="visit_date" class="text-input form-control login_input"
                    required>
                <span class="input-label">تاريخ الزيارة</span>
            </div>
            <div id="date-error" class="text-danger"></div>
        </div>
        <div class="form-group">
            <div class="input-box">
                <select class="form-control" id="hospital-select" name="hospital">
                    <option value="عين البيضا / العيادات - مشفى عين البيضا">عين البيضا / العيادات - مشفى عين البيضا
                    </option>
                    <option value="اعزاز / العيادات - مشفى الامل">اعزاز / العيادات - مشفى الامل</option>
                    <option value="اعزاز / العيادات - مستوصف مشفى الامل">اعزاز / العيادات - مستوصف مشفى الامل</option>
                </select>
                <span class="input-label">اختر المشفى من فضلك</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select class="form-control" id="clinic-select" name="clinic">
                    <option value="عيادة نسائية">عيادة نسائية</option>
                    <option value="عيادة اطفال">عيادة اطفال</option>
                    <option value="عيادة عامة">عيادة عامة</option>
                    <option value="عيادة نفسية">عيادة نفسية</option>
                    <option value="جراحة عامة">جراحة عامة</option>
                    <option value="عيادة عظمية">عيادة عظمية</option>
                </select>
                <span class="input-label">اختر العيادة المراد الحجز بها من فضلك</span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-box">
                <input type="text" id="first-name" placeholder=" " name="first-name"
                    class="text-input form-control login_input" autofocus required>
                <span class="input-label">الاسم الاول</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="text" id="father-name" placeholder=" " name="father-name"
                    class="text-input form-control login_input" required>
                <span class="input-label">اسم الاب</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="text" id="last-name" placeholder=" " name="last-name"
                    class="text-input form-control login_input" required>
                <span class="input-label">الكنية</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="text" id="mother-name" placeholder=" " name="mother-name"
                    class="text-input form-control login_input" required>
                <span class="input-label">اسم الام</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="text" id="full-name" placeholder=" " name="full-name"
                    class="text-input form-control login_input" required>
                <span class="input-label">الاسم الكامل</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="date" id="birthdate" name="birthdate" class="text-input form-control login_input" required>
                <span class="input-label">تاريخ الميلاد</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select id="gender" name="gender" class="text-input form-control login_input" required>
                    <option value="male">ذكر</option>
                    <option value="female">أنثى</option>
                </select>
                <span class="input-label">الجنس</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select id="document-type" name="document-type" class="text-input form-control login_input" required>
                    <option value="الهوية السورية">الهوية السورية</option>
                    <option value="دفتر العائلة">دفتر العائلة</option>
                    <option value="جواز سفر">جواز سفر</option>
                    <option value="رخصة قيادة">رخصة قيادة</option>
                    <option value="كتاب عسكري">كتاب عسكري</option>
                    <option value="حالة الاسرة">حالة الاسرة</option>
                    <option value="المعرفات الرسمية">المعرفات الرسمية</option>
                    <option value="مذكرة تسجيل فردية">مذكرة تسجيل فردية</option>
                    <option value="بيان زواج">بيان زواج</option>
                    <option value="شهادة الميلاد">شهادة الميلاد</option>
                    <option value="شهادة الهوية">شهادة الهوية</option>
                    <option value="معرف LC الرسمي (Kimlik)">معرف LC الرسمي (Kimlik)</option>
                </select>
                <span class="input-label">نوع الوثيقة</span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-box">
                <input type="number" id="doc_num" placeholder=" " name="doc_num"
                    class="text-input form-control login_input" required>
                <span class="input-label">رقم الوثيقة</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select id="residency-status" name="residency-status" class="text-input form-control login_input"
                    required>
                    <option value="resident">مقيم</option>
                    <option value="displaced">نازح</option>
                </select>
                <span class="input-label">هل انت مقيم ام نازح</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="text" id="origin-place" placeholder=" " name="origin-place"
                    class="text-input form-control login_input" required>
                <span class="input-label">المكان الأصلي</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="number" id="displacement-period" placeholder=" " name="displacement-period"
                    class="text-input form-control login_input" required>
                <span class="input-label">فترة النزوح بالأشهر</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select id="marital-status" name="marital-status" class="text-input form-control login_input" required>
                    <option value="single">أعزب/عزباء</option>
                    <option value="married">متزوج/متزوجة</option>
                    <option value="divorced">مطلق/مطلقة</option>
                </select>
                <span class="input-label">الحالة الاجتماعية</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select id="is-pregnant" name="is-pregnant" class="text-input form-control login_input" required>
                    <option value="yes">نعم</option>
                    <option value="no">لا</option>
                </select>
                <span class="input-label">هل هي حامل</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select id="is-breastfeeding" name="is-breastfeeding" class="text-input form-control login_input"
                    required>
                    <option value="yes">نعم</option>
                    <option value="no">لا</option>
                </select>
                <span class="input-label">هل هي مرضع</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <input type="tel" id="phone-number" placeholder=" " name="phone-number"
                    class="text-input form-control login_input" required>
                <span class="input-label">رقم الهاتف</span>
            </div>
        </div>

        <div class="form-group">
            <div class="input-box">
                <select id="has-disability" name="has-disability" class="text-input form-control login_input" required>
                    <option value="yes">نعم</option>
                    <option value="no">لا</option>
                </select>
                <span class="input-label">هل لديه إعاقة</span>
            </div>
        </div>

        <!-- Add any additional fields here -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php
   include  $tpl . 'footer.php';

ob_end_flush()
?>