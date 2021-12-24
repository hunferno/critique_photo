<h1>Les photos</h1>
<div class="row flex">

    <?php
    foreach ($photos as $photo) {
        echo '<div class="col-4">
            <div class="card">';
        echo '<img src="App/Images/' . $photo->getName_file() . '" class="card-img-top" alt="photo" style="width: 10rem; margin: 5px auto">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $photo->getTitle_photo() . '</h5>';
        echo '<p class="card-text">';
        echo '<h3>postée par : ' . 'Pseudo du posteur' . '</h3>';
        echo '<h3>date : ' . $photo->getPost_at() . '</h3>';
        echo '</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<a href="index.php?entity=photo&action=show&id=' . $photo->getId_photo() . '" class="btn btn-primary">Voir</a>';
        // echo '<div onclick="like(event)" data-id-photo="' . $photo->getId_photo() . '" class="float-right">'
        //     . '<i data-like="1" class="fa fa-thumbs-up"></i> <i data-like="-1" class="fa fa-thumbs-down"></i>'
        //     . '<p class="mb-0">' . $photo->getNbr_like() . '</p></div>';
        echo '</div>
            </div>
        </div>';
    }
    ?>
</div>

<!-- <script>
    function like(ev) {
        //alert(ev.currentTarget.dataset.idPhoto);
        //alert(ev.target.getAttribute('class'));
        div = ev.currentTarget;
        idPhoto = ev.currentTarget.dataset.idPhoto;
        valLike = ev.target.dataset.like;
        url = 'index.php?page=photo&action=like';
        $.ajax({
            method: "POST",
            url: url,
            data: {photo: idPhoto, like: valLike}
        })
        .done(function (reponse) {
            //alert("Nombre de likes : " + reponse.photo + ' ' + reponse.nbrLike);
            div.lastElementChild.textContent = reponse.nbrLike;
        });
    }
</script> -->