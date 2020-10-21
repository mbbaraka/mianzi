<div>
	<div class="col-10">
       <div class="custom-control custom-radio" wire:click="getPickup({{$idd}})">
         <input class="custom-control-input" type="radio" id="{{$pickup->id}}" name="pickupstation">
         <label for="{{$pickup->id}}" class="custom-control-label">{{$pickup->name}}</label>
         <p class="text-muted small"><span class="font-weight-bold">Address: </span> {{$pickup->address}}  Close to {{$pickup->close_to}}</p>
       </div>
       <p>{{$fee}}</p>
    </div>
</div>