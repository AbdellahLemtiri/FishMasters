<section class="px-4 py-10">
    <h2 class="text-3xl font-bold mb-6">Calendrier</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <?php foreach($competitions as $comp): ?>
            <div class="border rounded-xl p-4 shadow-md">
                <h3 class="font-bold text-xl"><?= $comp['titreCompetition'] ?></h3>
                <p class="text-gray-500"><?= $comp['typeCompetition'] ?></p>
                <p>📍 <?= $comp['lieuCompetition'] ?></p>
                <p>📅 Du <?= $comp['dateDebut'] ?> au <?= $comp['dateFin'] ?></p>
            </div>
        <?php endforeach; ?>

    </div>
</section>