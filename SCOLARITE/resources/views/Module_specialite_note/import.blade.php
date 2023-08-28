<div class="modal fade container" id="importNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body container" method="POST" action="{{route('importer')}}" enctype="multipart/form-data">
                @csrf
                  @if( isset($var['module_specialite']->id) ) <input type="hidden" name="module_specialite" value="{{ $var['module_specialite']->id }}"> @endif
                  @if( isset($var['annee_academique']->id)  ) <input type="hidden" name="annee_academique" value="{{  $var['annee_academique']->id   }}"> @endif


                  <div class="form-group">
                    <label for="exampleInputPassword1">Unite enseignement</label>
                    <input disabled class="form-control" @if($var['module_specialite']->libelle_unite_enseignement) value="{{ $var['module_specialite']->libelle_unite_enseignement }}" @endif>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Element constitutif</label>
                    <input disabled class="form-control" @if($var['module_specialite']->libelle_element_constitutif) value='{{ $var['module_specialite']->libelle_element_constitutif }}' @endif>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Credit</label>
                    <input disabled class="form-control" @if($var['module_specialite']->credit) value='{{ $var['module_specialite']->credit }}' @endif>
                  </div>
                  <div class="form-group">
                    <label for="formFileLg" class="form-label">Fichier</label>
					<input class="form-control form-control-lg" id="formFileLg"name="fichier" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>