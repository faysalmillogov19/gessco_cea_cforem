<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modules</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('affectation_enseignant.store')}}">
                @csrf
                  @if(isset($var['module_specialite']->id)) <input type="hidden"  name="module_specialite" value="{{$var['module_specialite']->id}}"> @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enseignant</label>
                    <select name="enseignant" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['enseigants'] as $row)
                            <option value="{{$row->id}}">{{ $row->nom_complet }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <select name="type_affectation" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['type_affectation'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Statut</label>
                    <select name="statut" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['statut'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Pays</label>
                    <select name="pays" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['pays'] as $row)
                            <option value="{{$row->id}}">{{ $row->nom_fr_fr }}</option>
                          @endforeach
                    </select>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Ville</label>
                    <select name="ville" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['villes'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
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