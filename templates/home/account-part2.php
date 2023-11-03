<?= $this->extend("layouts/test") ?>

<?= $this->section("header") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>
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