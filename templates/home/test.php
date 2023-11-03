<?= $this->extend("layouts/test") ?>

<?= $this->section("header") ?>
<link rel="stylesheet" href="./css/map.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<?= $this->endSection() ?>

<?= $this->section("content") ?>
<?= $this->include('partials/modal-profil-part1') ?>
<?= $this->include('partials/modal-profil-code')  ?>
<?= $this->include('partials/modal-profil-part2') ?>
<?= $this->endSection(); ?>

<?= $this->section("js") ?>
<script src="<?= base_url() . 'js/common.js' ?>"></script>
<script src="<?= base_url() . 'js/navbar.js' ?>"></script>
<script src="<?= base_url() . 'js/twilio.js' ?>"></script>
<script>
    let close = document.querySelector("#close");
    let close_activation = document.querySelector("#close-activation");
    let day = document.querySelector("#day");
    let month = document.querySelector("#month");
    let year = document.querySelector("#year");
    let finish = document.querySelector(".modal-finish");
    let activation = document.querySelector(".modal-activation");
    let select_tel_int = document.querySelector("#tel-int");
    let code_sms = document.querySelector("#code-sms");

    let btnValideTel = document.querySelector("#validTel");

    if (code_sms !== null) {
        code_sms.onkeypress = (event) => {
            if (event.keyCode < 48 || event.keyCode > 57) { // keyCode 48-57 représente les chiffres de 0 à 9
                event.preventDefault();
            }
        }
    }
    close.addEventListener("click", () => {
        finish.classList.add("collapse");
    });
    if (close_activation !== null) {

        close_activation.addEventListener("click", () => {
            activation.classList.add("collapse");
        });
    }
       
    function sendCode(){
        sendMessage("+33665167626", "Code de vérification : 4405");        
        return false;
    }
    //fillday();
    //fillmonth();
    //fillyear();
    fillTelInter(select_tel_int, "<?= base_url() ?>json/it-world.json", "France");
</script>
<?= $this->endSection() ?>