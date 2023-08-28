<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document" >       
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Utilisateur</h5>
                <button type="button" class="close" row-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('utilisateur.store')}}">
                @csrf
                 @if(isset($row->id)) <input type="hidden" name="id" value="{{$row->id}}"> @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select name="role" class="custom-select" required>
                          @if(isset($row->role))<option value="{{$row->role}}">{{ $row->libelle }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['roles'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" row-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>