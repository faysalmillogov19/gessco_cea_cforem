<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pièce jointe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('dossier.store')}}" enctype="multipart/form-data">
                @csrf
				  
				  @if(isset($var['personne']->id)) <input type="hidden" name="personne" value="{{$var['personne']->id}}"> @endif
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">libelle </label>
                    <input type="text" class="form-control" name="libelle" id="exampleInputPassword1" placeholder="libelle" required>
                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control" name="fichier" id="exampleInputPassword1" placeholder="fichier" accept="application/pdf" required >
					<label for="exampleInputPassword1">Fichier</label>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>