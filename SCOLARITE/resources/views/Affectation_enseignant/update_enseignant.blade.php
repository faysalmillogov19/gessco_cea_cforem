<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modules</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('affectation_enseignant.store')}}">
                @csrf
                  @if(isset($var['module_specialite']->id)) <input type="hidden"  name="module_specialite" value="{{$var['module_specialite']->id}}"> @endif
				  @if(isset($row->id)) <input type="hidden"  name="id" value="{{$row->id}}"> @endif
				  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enseignant</label>
                    <select name="enseignant" class="custom-select" required>
						  <option value="{{$row->enseignant}}">{{ $row->nom_complet }}</option>
                          <option disabled></option> 
                          @foreach($var['enseigants'] as $r)
                            <option value="{{$r->id}}">{{ $r->nom_complet }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <select name="type_affectation" class="custom-select" required>
						 <option value="{{$row->type_affectation}}">{{ $row->libelle_type_affectation }}</option> 
                          <option disabled></option> 
                          @foreach($var['type_affectation'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Statut</label>
                    <select name="statut" class="custom-select" required>
						 <option value="{{$row->statut}}">{{ $row->libelle_statut }}</option>
                          <option disabled></option> 
                          @foreach($var['statut'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Pays</label>
                    <select name="pays" class="custom-select" required>
						  <option value="{{$row->pays}}">{{ $row->nom_fr_fr }}</option> 
                          <option disabled></option> 
                          @foreach($var['pays'] as $r)
                            <option value="{{$r->id}}">{{ $r->nom_fr_fr }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Ville</label>
                    <select name="ville" class="custom-select" required>
						 <option value="{{$row->ville}}">{{ $row->libelle_ville }} </option>
                          <option disabled></option> 
                          @foreach($var['villes'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Date affectation </label>
                    <input type="date" class="form-control" name="date_affectation" id="exampleInputPassword1" placeholder="Date affectation" @if(isset($row->date_arret)) value="{{$row->date_arret}}" @endif >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date arret </label>
                    <input type="date" class="form-control" name="date_arret" id="exampleInputPassword1" placeholder="Date arret" @if(isset($row->date_arret)) value="{{$row->date_arret}}" @endif >
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>