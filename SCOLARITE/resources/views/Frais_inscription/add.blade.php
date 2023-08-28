<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Frais d'insciption</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('frais_inscription.store')}}">
                @csrf
                  @if(isset($var['specialite']->id)) <input type="hidden" name="specialite" value="{{$var['specialite']->id}}"> @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Element scolarite</label>
                    <select name="element_scolarite" class="custom-select" required>
                          <option disabled></option> 
                          @foreach($var['element_scolarites'] as $row)
                            <option value="{{$row->id}}">{{ $row->libelle }}</option>
                          @endforeach
                    </select>
                   </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Montant etudiant UEMOA</label>
                    <input type="number" class="form-control" min="0" name="montant_etudiant_uemoa" id="exampleInputPassword1" placeholder="Etudiant zone UEMOA" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Montant salarie UEMOA</label>
                    <input type="number" class="form-control" min="0" name="montant_salarie_uemoa" id="exampleInputPassword1" placeholder="Salarié zone UEMOA" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Montant etudiant autre</label>
                    <input type="number" class="form-control" min="0" name="montant_etudiant_autre" id="exampleInputPassword1" placeholder="Etudiant autre" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Montant boursier total</label>
                    <input type="number" class="form-control" min="0" name="montant_boursier_total" id="exampleInputPassword1" placeholder="Montant boursier total" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Montant boursier partiel</label>
                    <input type="number" class="form-control" min="0" name="montant_boursier_partiel" id="exampleInputPassword1" placeholder="Montant boursier partiel" required>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>