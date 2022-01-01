$(".btn-primary").click(function(e){
    e.preventDefault()
    let idPelicula=$(this).data("id");
    fetch(`/peliculas/${idPelicula}/edit`,{
                  method:"GET",
                  headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
              }).then(response => response.json())
              .then(data => {
          

                  $.confirm({
              title: 'Editar',
              content: `<div class="card card-fondo">
              <div class="card-body"> 
              <form action="/peliculas" method="post">
                  <div class="form-group">

                      <label for="nombre_pelicula">Nombre de pelicula</label>
                      <input type="text" name="nombre_pelicula" id="nombre_pelicula" class="form-control" value="${data.nombre_pelicula}">
                  </div>
                  <div class="form-group">
                      <label for="descripcion_pelicula">Descripcion</label>
                      <textarea  name="descripcion_pelicula" id="descripcion_pelicula" class="form-control">
                          ${data.descripcion_pelicula.trim()}
                      </textarea>
                  </div>
                  <div class="form-group">
                      <label for="tipo_pelicula">Genero de Pelicula</label>
                      <select name="tipo_pelicula" id="tipo_pelicula" class="form-control">
                          <option value="accion" ${(data.tipo_pelicula == "accion") ? "selected": ""} >Accion</option>
                          <option value="comedia" ${(data.tipo_pelicula == "comedia") ? "selected": ""}>Comedia</option>
                          <option value="romance" ${(data.tipo_pelicula == "romance") ? "selected": ""}>Romance</option>
                          <option value="terror" ${(data.tipo_pelicula == "terror") ? "selected": ""}>Terror</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="fecha_estreno_pelicula">Fecha de Estreno Pelicula</label>
                      <input type="date" name="fecha_estreno_pelicula" id="fecha_estreno_pelicula" class="form-control" value="${data.fecha_estreno_pelicula}">
                  </div>
                  <div class="form-group">
                      <label for="precio_pelicula">Precio de la Pelicula</label>
                      <input type="text" name="precio_pelicula" id="precio_pelicula" class="form-control" value="${data.precio_pelicula}">
                  </div>
              </form>
              </div>
              </div>`,
              buttons: {
              confirm: function () {
                  let dataPelicula={
                      'nombre_pelicula':$("#nombre_pelicula").val(),
                      'descripcion_pelicula':$("#descripcion_pelicula").val().trim(),
                      'tipo_pelicula':$("#tipo_pelicula").val(),
                      'fecha_estreno_pelicula':$("#fecha_estreno_pelicula").val(),
                      'precio_pelicula':$("#precio_pelicula").val()
                  }
                  fetch(`/peliculas/${idPelicula}`,{
                           method:"PUT",
                          headers: {
                                  'Content-Type': 'application/json',
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          body:JSON.stringify(dataPelicula),
                      }).then(response => response.json())
                  .then(data => {
                     if(data){
                      Swal.fire({
                          icon: 'success',
                          title: 'Se actualizado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                      })
                      location.reload();
                     }else{
                      Swal.fire({
                          icon: 'Error',
                          title: 'No se actualizado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                      })
                     }
                  })
                  .catch(error => {
                      Swal.showValidationMessage(
                      `Request failed: ${error}`
                      )
                  })
                 
              },
              cancel: function () {
                  $.alert('Canceled!');
              },
          }
      });
      }).catch(error => {
          Swal.showValidationMessage(
             `Request failed: ${error}`
          )
      })

    
})


$(".btn-danger").click(function (e) { 
    e.preventDefault();
    let idPelicula= $(this).data("id")
    Swal.fire({
          title: 'Esta seguro de Eliminar esta pelicula',
          showCancelButton: true,
          confirmButtonText: 'Si',
          showLoaderOnConfirm: true,
          preConfirm: () => {
              return fetch(`/peliculas/${idPelicula}`,{
                  method:"DELETE",
                  headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
              })
                  .then(response => {
                     if(response.ok=true){
                      Swal.fire({
                          icon: 'success',
                          title: 'Se eliminado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                      })
                      location.reload();
                     }else{
                      Swal.fire({
                          icon: 'Error',
                          title: 'No se  eliminado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                      })
                     }
                  })
                  .catch(error => {
                      Swal.showValidationMessage(
                      `Request failed: ${error}`
                      )
                  })
          }
      })
});  