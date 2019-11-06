var id;
  $('#modalSuppression').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget); // Button that triggered the modal
  id = button.data('id'); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  });
  $( "#confirmer" ).click(function() {
    console.log(id);
    $.ajax({
    url: "post/delete.php?id_resa="+id,
    }).done(function( str ) {
      $('#modalSuppression').modal('hide');
      alert('Cela a bien été supprimé');
      document.location.reload(true);
    });
  });