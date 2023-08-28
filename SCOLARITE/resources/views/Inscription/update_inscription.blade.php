<div class="modal fade" id="update{{$datum->id}}" tabindex="-1" role="dialog" aria-labelledby="UpdateModal" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateModal">Inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('inscription.store')}}">
                @csrf
                  @if(isset($var['etudiant']->id)) <input type="hidden" name="etudiant" value="{{$var['etudiant']->id}}"> @endif

                  @if(isset($datum->id)) <input type="hidden" name="id" value="{{$datum->id}}"> @endif
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Specialite</label>
                    <select name="specialite" class="custom-select" required>
                          @if(isset($datum->specialite))<option value="{{$datum->specialite}}">Formation : {{$datum->libelle_filiere}} / Type: {{ $datum->libelle_type_formation.'('.$datum->libelle_orientation.')' }}</option>{{ $datum->libelle_specialite }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['specialite'] as $row)
                            <option value="{{$row->id}}">Annee: {{$row->libelle_annee_academique}} Formation : {{$row->libelle_filiere}} / Type: {{ $row->libelle_type_formation.'('.$row->libelle_orientation.')' }}</option>
                          @endforeach
                    </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputPassword1">Année academique</label>
                    <select name="annee_academique" class="custom-select" required>
                          @if(isset($datum->annee_academique))<option value="{{$datum->annee_academique}}">{{ $datum->libelle_annee_academique }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['annee_academique'] as $row)
                            <option value="{{$row->id}}"> {{$row->libelle}}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="date" class="form-control" name="date" id="exampleInputPassword1" placeholder="Date " @if(isset($datum->date)) value="{{$datum->date}}" @endif required>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>