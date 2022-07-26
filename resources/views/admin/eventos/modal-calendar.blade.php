<div class="modal fade" id="modalCalendar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <div class="message"></div>
          
          <form id="formEvent">
            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Titulo</label>
              <div class="col-sm-8">
                <input type="text" name="title" class="form-control" id="title">
                <input type="hidden" name="id">
              </div>
            </div>
            <div class="form-group row">
              <label for="start" class="col-sm-2 col-form-label">Fecha/Hora Inicio</label>
              <div class="col-sm-8">
                <input type="text" name="start" class="form-control date-time" id="start">
              </div>
            </div>
            <div class="form-group row">
              <label for="end" class="col-sm-2 col-form-label">Fecha/Hora Fin</label>
              <div class="col-sm-8">
                <input type="text" name="end" class="form-control date-time" id="end">
              </div>
            </div>
            <div class="form-group row">
              <label for="color" class="col-sm-2 col-form-label">Color de Evento</label>
              <div class="col-sm-8">
                <input type="color" name="color" class="form-control" id="color">
              </div>
            </div>
            <div class="form-group row">
              <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
              <div class="col-sm-8">
                  <textarea name="descripcion" id="descripcion" cols="40" rows="4"></textarea>
              </div>
            </div>
          </form>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary saveEvent">Salvar</button>
          <button type="button" class="btn btn-danger deleteEvent">Borrar</button>
  
        </div>
      </div>
    </div>
  </div>