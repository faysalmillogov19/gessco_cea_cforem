<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document" >       
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Module</h5>
                <button type="button" class="close" row-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('specialite_module.store')}}">
                @csrf
                 @if(isset($row->id)) <input type="hidden" name="id" value="{{$row->id}}"> @endif
                  @if(isset($var['specialite']->id)) <input type="hidden" name="specialite" value="{{$var['specialite']->id}}"> @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unite d'Engnement</label>
                    <select name="unite_enseignement" class="custom-select" required>
                          @if(isset($row->unite_enseignement))<option value="{{$row->unite_enseignement}}">{{ $row->libelle_unite_enseignement }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['unite_enseignements'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Element constituf</label>
                    <select name="element_constitutif" class="custom-select" required>
                          @if(isset($row->element_constitutif))<option value="{{$row->element_constitutif}}">{{ $row->libelle_element_constitutif }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['element_constitutifs'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Semestre</label>
                    <select name="semestre" class="custom-select" required>
                          @if(isset($row->semestre))<option value="{{$row->semestre}}">{{ $row->libelle_semestre }}</option>@endif
                          <option disabled></option> 
                          @foreach($var['semestres'] as $r)
                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                          @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Credit</label>
                    <input type="number" class="form-control" min="1" name="credit" id="exampleInputPassword1" placeholder="Credit" @if(isset($row->credit)) value="{{$row->credit}}" @endif required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures cours Theorique</label>
                    <input type="number" class="form-control" min="0" name="theorie" id="exampleInputPassword1" placeholder="heure cours theorique" @if(isset($row->theorie)) value="{{$row->theorie}}" @endif required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures TD</label>
                    <input type="number" class="form-control" min="0" name="td" id="exampleInputPassword1" placeholder="TD" @if(isset($row->td)) value="{{$row->td}}" @endif required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heures TP</label>
                    <input type="number" class="form-control" min="0" name="tp" id="exampleInputPassword1" placeholder="TP" @if(isset($row->tp)) value="{{$row->tp}}" @endif required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Observations</label>
                    <textarea class="form-control" name="observation" placeholder="Observations" >@if(isset($row->observation)) {{$row->observation}} @endif</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date arret </label>
                    <input type="date" class="form-control"  name="date_arret" id="exampleInputPassword1" placeholder="TP" @if(isset($row->date_arret)) value="{{$row->date_arret}}" @endif >
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" row-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>