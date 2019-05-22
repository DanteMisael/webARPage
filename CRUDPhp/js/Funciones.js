<script>
function newMovie(){
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
  });
}
function newCbLanguage(){
  openCbLanguage('new', null, null, null, null, null, null, null);
}

function openCbLanguage(action, idMovie, Name, DurMin, Genre){
  document.formCbLanguage.idMovie.value = idMovie;
  document.formCbLanguage.Name.value = Name;
  document.formCbLanguage.DurMin.value = DurMin;
  document.formCbLanguage.Genre.value = Genre;

  document.formCbLanguage.idMovie.disabled = (action === 'see')?true:false;
  document.formCbLanguage.Name.disabled = (action === 'see')?true:false;
  document.formCbLanguage.DurMin.disabled = (action === 'see')?true:false;
  document.formCbLanguage.Genre.disabled = (action === 'see')?true:false;

  $('#myModal').on('shown.bs.modal', function () {
    var modal = $(this);
    if (action === 'new'){
      modal.find('.modal-title').text('Creación de idioma');
      $('#save-language').show();
      $('#update-language').hide();
    }else if (action === 'edit'){
      modal.find('.modal-title').text('Actualizar idioma');
      $('#save-language').hide();
      $('#update-language').show();
    }else if (action === 'see'){
      modal.find('.modal-title').text('Ver idioma');
      $('#save-language').hide();
      $('#update-language').hide();
    }
    $('#idlanguage').focus()

  });
}

</script>
