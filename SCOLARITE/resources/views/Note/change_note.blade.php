<div class="modal fade container" id="change{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body container" method="POST" action="{{route('note.store')}}">
                @csrf
                  @if(isset($var['inscription']->id)) <input type="hidden" name="inscription" value="{{$var['inscription']->id}}"> @endif
                  @if(isset($row->id_module_specialite)) <input type="hidden" name="module_specialite" value="{{$row->id_module_specialite}}"> @endif


                  <div class="form-group">
                    <label for="exampleInputPassword1">Unite enseignement</label>
                    <input disabled class="form-control" @if($row->libelle_unite_enseignement) value="{{ $row->libelle_unite_enseignement }}" @endif>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Element constitutif</label>
                    <input disabled class="form-control" @if($row->libelle_element_constitutif) value='{{ $row->libelle_element_constitutif }}' @endif>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Credit</label>
                    <input disabled class="form-control" @if($row->credit) value='{{ $row->credit }}' @endif>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Note</label>
                    <input type="number" class="form-control" name="note" id="exampleInputPassword1" placeholder="Note" @if($row->note) value='{{ $row->note }}' @endif  >
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>