<div class="modal fade" id="addInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('inscription.store')}}">
                @csrf
                  @if(isset($var['etudiant']->id)) <input type="hidden" name="etudiant" value="{{$var['etudiant']->id}}"> @endif
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Specialite</label>
                    <select name="specialite" class="custom-select" required>
                          @if(isset($datum->libelle_specialite))<option value="{{$datum->specialite.'('.$row->libelle_niveau.')'}}">{{ $datum->libelle_specialite }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['specialite'] as $row)
                            <option value="{{$row->id}}">Formation : {{$row->libelle_filiere}} / Type: {{ $row->libelle_type_formation.'('.$row->libelle_orientation.')' }}</option>
                          @endforeach
                    </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputPassword1">Année academique</label>
                    <select name="annee_academique" class="custom-select" required>
                          @if(isset($datum->annee_academique))<option value="{{$row->annee_academique}}">{{ $datum->libelle_annee_academique }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['annee_academique'] as $row)
                            <option value="{{$row->id}}">Annee: {{$row->libelle}}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="date" class="form-control" name="date" id="exampleInputPassword1" placeholder="Date " @if(isset($datum->montant)) value="{{$datum->montant}}" @endif required>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>