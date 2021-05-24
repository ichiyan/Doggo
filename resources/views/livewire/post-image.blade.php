<div class="modal fade bd-example-modal-lg" id="image-{{$nthImage}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style=" margin: 0 auto; padding: 0;">
        <div class="modal-content p-2 rounded mt-5" style="background-color: rgba(0, 0, 0, 0.363);">
            <div class="row">
                <div class="col align-self-end">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="row mt-2" >
                <div class="col">
                    <div class="row">
                        <img src="{{ url($image) }}" alt="dog image" style="min-height: 500px; width: 100%;">
                    </div>

                </div>

                <div class="col-5" >
                    <div class="card" style="height: 100%; width: 100%;">
                        <div class="card-content p-2">
                            {{-- livewire --}}
                            <div class="form-group text-nowrap"><p class="collapse show hide"><b>Description</b>: <br>{{$description}}</p></div>
                                <form wire:submit.prevent="submitForm" class="collapse hide">
                                    <textarea class="form-control" wire:model.defer="description" name="image_description" cols="30" rows="10"> {{$description}}</textarea>

                                    <div class="card-footer collapse hide">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary" wire:click="submitForm"> Done Editing</button>
                                                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target=".hide">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                        @if ($this->canEdit())
                            <div class="row collapse show hide">
                                <div class="col ml-3 ">
                                    <button type="button" data-toggle="collapse" data-target=".hide" class="btn btn-light" style="border: 1px solid black;">Edit</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
