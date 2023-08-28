<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modules</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('specialite_module.store')}}">
                @csrf
                  @if(isset($var['specialite']->id)) <input type="hidden" name="specialite" value="{{$var['specialite']->id}}"> @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unite d'Engnement</label>
                    <select name="unite_enseignement" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['unite_enseignements'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Element constituf</label>
                    <select name="element_constitutif" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['element_constitutifs'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Semestre</label>
                    <select name="semestre" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['semestres'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Credit</label>
                    <input type="number" class="form-control" min="1" name="credit" id="exampleInputPassword1" placeholder="Credit" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures cours Theorique</label>
                    <input type="number" class="form-control" min="0" name="theorie" id="exampleInputPassword1" placeholder="heure cours theorique" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures TD</label>
                    <input type="number" class="form-control" min="0" name="td" id="exampleInputPassword1" placeholder="TD" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures TP</label>
                    <input type="number" class="form-control" min="0" name="tp" id="exampleInputPassword1" placeholder="TP" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Observations</label>
                    <textarea class="form-control" name="observation" placeholder="Observations" ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date arret </label>
                    <input type="date" class="form-control" name="date_arret" id="exampleInputPassword1" placeholder="TP" @if(isset($row->date_arret)) value="{{$row->date_arret}}" @endif >
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>