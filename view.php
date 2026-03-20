<?php 
require("header.php");
require("fonctions.php"); 


if (isset($_GET['id']) && !empty($_GET['id'])) { 
    $id = $_GET['id'];
    $DetailFilm = DetailFilm($id); 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Détail du film</title>

<style>

/* CONTAINER */
.film-container {
    display: flex;
    gap: 40px;
    padding: 40px;
    background-color: #f5f5f5;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* IMAGE */
.film-image img {
    width: 300px;
    border-radius: 5px;
}

/* INFOS */
.film-info {
    max-width: 500px;
}

.film-info h1 {
    text-align: center;
    background-color: #eaeaea;
    padding: 10px;
    border-radius: 5px;
}

/* DESCRIPTION */
.overview {
    text-align: center;
    font-size: 14px;
    margin: 20px 0;
}

/* GENRES */
.genres {
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
}

.genre-title {
    background-color: #2f6fed;
    color: white;
    text-align: center;
    padding: 10px;
}

.genre-item {
    text-align: center;
    padding: 10px;
    border-top: 1px solid #ccc;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .film-container {
        flex-direction: column;
        align-items: center;
    }
}

</style>

</head>

<body>

<?php if ($DetailFilm) : ?>

<div class="film-container">

    <!-- IMAGE -->
    <div class="film-image">
        <img src="<?php echo 'https://image.tmdb.org/t/p/w780/'.$DetailFilm['poster_path']; ?>">
    </div>

    <!-- INFOS -->
    <div class="film-info">
        <h1><?php echo htmlspecialchars($DetailFilm['title']); ?></h1>

        <p class="overview">
            <?php echo htmlspecialchars($DetailFilm['overview']); ?>
        </p>

        <div class="genres">
            <div class="genre-title">Genre</div>

            <?php foreach ($DetailFilm['genres'] as $genre) : ?>
                <div class="genre-item">
                    <?php echo htmlspecialchars($genre['name']); ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

</div>

<?php else : ?>
    <p style="text-align:center;">Film introuvable</p>
<?php endif; ?>

<?php require("footer.php"); ?>

</body>
</html>