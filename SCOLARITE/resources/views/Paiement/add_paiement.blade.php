<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Paiement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('paiement.store')}}">
                @csrf
                  @if(isset($var['inscription']->id)) <input type="hidden" name="inscription" value="{{$var['inscription']->id}}"> @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <select name="type_paiement" class="custom-select" required>
                          <option value="1">Paiement</option> 
                            <option value="-1">Surplus</option>
                    </select>
                   </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Montant</label>
                    <input type="number" class="form-control" min="0" name="montant" id="exampleInputPassword1" placeholder="Montant" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="date" class="form-control" name="date" id="exampleInputPassword1" placeholder="Date" required >
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>