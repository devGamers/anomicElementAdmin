<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Tableau de bord</h3>
        </div>

    </div>

    <div class="content-body">
        <section id="drag-area">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </section>

    </div>
</div>

<script>
    $('#menuTableauBord').addClass('active')

    <?php if(isset($_SESSION['welcome']) && $_SESSION['welcome']) : ?>
        toastr.success(
            "Bienvenu <?= $_SESSION['name'] ?>.",
            "Anomic Elements",
            {
                positionClass: "toast-bottom-left",
                containerId: "toast-bottom-left",
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 2e3,
            }
        )
    <?php $_SESSION['welcome'] = false; endif ?>
</script>