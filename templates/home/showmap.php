<?= $this->extend("layouts/default") ?>

<?= $this->section("header") ?>
<link rel="stylesheet" href="./css/map.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<?= $this->endSection() ?>

<?= $this->section("content") ?>
<main>
    <div class="container-map">
        <div id="map"></div>
        <!--   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d47305811.70411305!2d-1.505619380178534!3d43.641559949999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1682407449349!5m2!1sfr!2sfr" width="100%" height="700px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    </div>
    <div class="btn-showmap"><a href="/">Afficher la liste&nbsp;&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 16px; width: 16px; fill: white;">
                <path fill-rule="evenodd" d="M2.5 11.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zM15 12v2H6v-2h9zM2.5 6.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zM15 7v2H6V7h9zM2.5 1.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zM15 2v2H6V2h9z"></path>
            </svg></a>
    </div>
</main>
<?= $this->endSection(); ?>

<?= $this->section("js") ?>
<script src="<?= base_url() . 'js/navbar.js' ?>"></script>
<script src="<?= base_url() . "js/map.js" ?>"></script>
<script>
    async function loadPrices(file) {
        let response = await fetch(file);
        let prices = await response.json();
        prices.forEach(price => {
            CreatePoint(price);
        });
    }

    function CreatePoint(price) {

    }

    function loadMap() {
        let map = new LeafLet();
        map.load();
        map.orginMarker("890€", "style2");
    }

    loadCardsSlide("<?= base_url() . "json/rubriques.json" ?>");
    loadMap();
</script>
<?= $this->endSection() ?>