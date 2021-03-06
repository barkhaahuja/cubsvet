<link href="<?php echo $ROOT; ?>/3rdparty/zurb-joyride/joyride-2.1.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/tour.css" rel="stylesheet">

<!-- Tip Content -->
<ol id="joyRideTipContent">
    <li data-id="homeButton" data-text="&rarr; NÆSTE" class="tour">
        <div class="tour-title">Arbejdsbord knappen</div>
        <p>Denne knap udgør, sammen med de lignende knapper i højre side, hovedmenuen. Hovedmenuen er altid synlig,
            ligegyldigt hvor du er i programmet.<br>
             ARBEJDSBORD-knappen bringer dig til Arbejdsbordet, som er det ‘sted’,
            du er lige nu.</p>
    </li>
    <li data-class="WeekProgNumb" data-text="&rarr; NÆSTE" class="tour">
        <div class="tour-title">Uge-tæller redskab</div>
        <p>Dette er et ‘redskab'. I løbet af behandlingen vil du få flere og flere redskaber, som vil blive synlige her
            på dit arbejdsbord. Redskaber er små værktøjer, du kan bruge til forskellige opgaver i løbet af
            behandlingen. Dette redskab fortæller dig, hvor mange dage og uger du er inde i dit ti-ugers forløb. En
            omgang er syv dage</p>
    </li>
    <li data-class="WD-Header" data-text="&rarr; NÆSTE" class="tour" data-options="tipLocation:right;">
        <div class="tour-title">Behandlings redskab</div>
        <p>Dette er ét af dine vigtigste redskaber. Det er det, der viser dig, hvor du er i behandlingen. Det er også
            det, der viser dig, hvordan du kommer videre. Det sker ved at du klikker på FORTSÆT. Du kan også klikke på
            OVERSIGT og få et større overblik over den del af behandlingen, du har været igennem.</p>
    </li>
    <li data-class="WD-Warning" data-text="&rarr; NÆSTE" class="tour" data-options="tipLocation:right;">
        <div class="tour-title">Brug for akut psykiatrisk hjælp</div>
        <p>Denne knap giver dig informationer om hvad du skal gøre og hvem du skal kontakte, hvis du pludseligt får
            det rigtig dårligt.</p>
    </li>
    <li data-class="MM-Sett" data-text="&rarr; NÆSTE" class="tour" data-options="tipLocation:bottom;">
        <div class="tour-title">Hovedmenu</div>
        <p>
            Disse knapper udgør resten af
            hovedmenuen. Her kan du få adgang
            til dine beskeder, biblioteket, indstillinger
            for programmet, hjælp til
            forskellige ting og slutteligt, er det
            også her du skal klikke for at logge
            ud af programmet.
            Klik endelig lidt rundt og lær
            menu’en at kende.
        </p>

        <p>
            Hvis du på et tidspunkt får brug for
            at få genopfrisket alt det du lige har
            fået at vide, så skal du bare klikke på
            HJÆLP i menuen og vælge
            Introduktion til arbejdsbordet.
        </p>
    </li>
</ol>

<script src="<?php echo $ROOT; ?>/3rdparty/zurb-joyride/jquery.joyride-2.1.js"></script>


<script>

    $(document).ready(function () {
            <?php if (isset($GET['show_help_guide'])): ?>
            $('#joyRideTipContent').joyride({
                autoStart: true,
                postStepCallback: function (index, tip) {
                    if (index == 4) {
                        $(this).joyride('set_li', false, 1);
                        window.parent.location.href = "<?php echo $ROOT; ?>/";
                    }
                },
                modal: true,
                expose: true
            });
            <?php endif; ?>
    });
</script>
