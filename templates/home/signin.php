<?= $this->extend("layouts/default") ?>
<?= $this->section("header") ?>
<link rel="stylesheet" href="<?= base_url() . "css/profile.css" ?>">
<link rel="stylesheet" href="<?= base_url() . "css/common.css" ?>">
<link rel="stylesheet" href="<?= base_url() . "css/navbar.css" ?>">
<link rel="stylesheet" href="<?= base_url() . "css/loading.css" ?>">
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="black-screen">
    <?= $this->include("partials/modal-profil-part0") ?>
    <?= $this->include("partials/modal-community") ?>
    <?= $this->include("partials/modal-profil-fill") ?>
    <?= $this->include("partials/modal-profil-part1") ?>
    <?= $this->include("partials/modal-profil-code") ?>
    <?= $this->include("partials/modal-profil-part2") ?>
    <?= $this->include("partials/modal-profil-part3") ?>
</div>
<?= $this->endSection() ?>

<?= $this->section("js") ?>
<script type="text/javascript" src="<?= base_url() . "js/validate.js" ?>"></script>
<script type="text/javascript" src="<?= base_url() . "js/common.js" ?>"></script>

<script>
    const _fill = document.querySelector(".modal-profil-fill");
    const _part0 = document.querySelector(".part0");
    const _part1 = document.querySelector(".part1");
    const _code = document.querySelector(".modal-complete-part1-1");
    const _part2 = document.querySelector(".part2");
    const _part3 = document.querySelector(".part3");
    let _finish = document.querySelector(".modal-finish");
    let _commnunity = document.querySelector(".card-community");
    const _picture_photo = document.querySelector("#picture_photo");
    const img_profile = "<?= session()->picture ?>";

    const part = "<?= $part ?>";
    hideSlides();
    fillday();
    fillmonth();
    fillyear();
    fillTelInter(document.querySelector("#tel-int"), "<?= base_url() ?>json/it-world.json", "+33");
    formAction(part);

    function onValideBirthday() {
        let _name = document.querySelector("#name");
        let _firstname = document.querySelector("#firstname");
        let _day = document.querySelector("#day");
        let _month = document.querySelector("#month");
        let _year = document.querySelector("#year");
        //
        if (!checkName(_name)) return false;
        if (!checkName(_firstname, "prénom vide")) return false;
        if (!checkDate(_day, _month, _year)) return false;
        //
        //onChange(action, elem);
        const elem = document.querySelector('#btn-part0');
        elem.innerHTML = "<div class='dot-fade'></div>&nbsp;";
        setTimeout(() => {
            formAction("community");
        }, 2000);
        return false;
    }


    function getCode() {
        let code = form_part1.tel_int.value;
        let phone = form_part1.tel.value;
        let phoneNumber = `${code}${phone.substr(1, phone.length)}`;
        form_part1.phoneNumber.value = phoneNumber;
        form_part1.action = "/user/signin/getcode";
        form_part1.submit();
    }

    function onChange(action, elem) {
        let ret = false;
        switch (action) {
            case "part0": // modal finish
                break;
            case "part1":
                ret = true;
                elem.innerHTML = "<div class='dot-fade'></div>&nbsp;";
                break;
            case "community":
                ret = true;
                elem.innerHTML = "<div class='dot-fade'></div>&nbsp;";
                break;
            case "code":
                elem = document.getElementById("validTel");

                ret = checkPhone(form_part1.tel);
                if (ret) {
                    elem.innerHTML = "<div class='dot-fade'></div>&nbsp;";
                    getCode();
                    //await sendCode(form_part1.tel_int.value,form_part1.tel.value);
                }
                break;
            case "part2":
                elem = document.getElementById("validCode");
                ret = checkCode(form_code.codesms);
                if (ret) {
                    elem.innerHTML = "<div class='dot-fade'></div>&nbsp;";
                }
                break;
            case "part3":
                elem = document.getElementById("validPart3");
                elem.innerHTML = "<div class='dot-fade'></div>&nbsp;";
                break;
            default:
                elem.innerHTML = "<div class='dot-fade'></div>&nbsp;";
                break;
        }
        if (ret) {
            setTimeout(() => {
                formAction(action);
            }, 2000);
        }
        return false;
    }

    function formAction(action) {
        _part0.classList.add('collapse');
        switch (action) {
            case "part0":
                _part0.classList.remove('collapse');
                _commnunity.classList.add('collapse');
                _finish.classList.remove('collapse');
                break;
            case "community":
                _finish.classList.add('collapse');
                _commnunity.classList.remove('collapse');
                break;
            case "part1":
                _commnunity.classList.add('collapse');
                _part1.classList.remove('collapse');
                break;
            case "code":
                _part1.classList.add('collapse');
                _code.classList.remove('collapse');
                break;
            case "part2":
                _code.classList.add('collapse');
                _part2.classList.remove('collapse');
                break;
            case "part3":
                _part2.classList.add('collapse');
                _part3.classList.remove('collapse');
                break;
        }
    }

    const readURL = file => {
        return new Promise((res, rej) => {
            const reader = new FileReader();
            reader.onload = e => res(e.target.result);
            reader.onerror = e => rej(e);
            reader.readAsDataURL(file);
        });
    };

    function onChooseFile() {
        const input = document.createElement("input");
        input.type = "file";
        input.accept = ".jpg, .png, .jpeg, .bmp"; // optionnel : n'accepte que les fichiers images
        input.onchange = (event) => {

            preview(event);
            setTimeout(() => {
                formAction("part3");
            }, 2000);
        }
        //input.addEventListener('change', preview);
        input.click();
    }

    const preview = async event => {
        const file = event.target.files[0];
        const url = await readURL(file);
        _picture_photo.src = url;
    };

    function onValidatePhoto(type) {
        if (type == "download") {
            onChooseFile();
            // _picture_photo.src = localStorage.picture;
            //

        } else {
            _picture_photo.src = img_profile;
        }
    }
</script>
<?= $this->endSection() ?>