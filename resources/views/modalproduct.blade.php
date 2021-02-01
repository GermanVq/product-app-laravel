<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1>CRUD PRODUCTOS</h1>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Modal Edit --}}
                <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title " id="title-modal"><kbd >Edit Product</kbd></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{route('dashboard.update', $Dashboard->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input required type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$Dashboard->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>description</label>
                                        <textarea required name="description" class="form-control" id="description" rows="3">{{$Dashboard->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Units</label>
                                        <input required type="number" name="unit" class="form-control" id="unit" placeholder="Units" value="{{$Dashboard->unit}}">
                                    </div>
                                    <div class="form-group">
                                        <label >Category</label>
                                        <select required name="category" id="category" class="form-control" value="{{$Dashboard->category}}">
                                            <option selected>Category</option>
                                            <option>Cleanliness</option>
                                            <option>Alimentary</option>
                                            <option>technology</option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input required type="number" name="price" class="form-control" id="price"
                                        placeholder="Price" value="{{$Dashboard->price}}">
                                    </div>
                                    <div class="form-group">
                                        <label >Status</label>
                                        <select required name="status" id="status" class="form-control" value="{{$Dashboard->status}}">
                                            <option value="1" selected>Actived</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</x-app-layout>