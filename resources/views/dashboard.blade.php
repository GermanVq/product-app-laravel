<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1>CRUD PRODUCTOS</h1>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <!-- Button trigger modal -->
                <button class="uppercase px-8 py-2 rounded bg-blue-300 text-blue-600 max-w-max shadow-sm hover:shadow-lg" data-toggle="modal" data-target="#exampleModalCenter">add product</button>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-label /> --}}
                <table class="border-collapse w-full">
                    <thead>
                        <tr>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">id</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">name</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">description</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">units</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">category</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">price</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">status</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Dashboards as $Dashboard)
                            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> 
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">id</span>{{$Dashboard->id}} 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>{{$Dashboard->name}} 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">description</span>{{$Dashboard->description}} 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Units</span>{{$Dashboard->unit}} 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Category</span>{{$Dashboard->category}} 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Price</span>{{$Dashboard->price}} 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">status</span>{{$Dashboard->status}} 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Options</span>
                                    <a href="{{route('dashboard.edit', $Dashboard->id)}}"  data-toggle="modal" data-target="#modalEdit" class="text-blue-400 hover:text-blue-600 underline"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="#" class="text-blue-400 hover:text-green-600 underline pl-6"><i class="fa fa-book-open"></i></a>
                                    <form action="{{route('dashboard.destroy', $Dashboard->id)}}" method="POST" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" href="" class="text-blue-400 hover:text-red-600 underline pl-4 "><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                @empty
                                <tr>
                                    <td colspan="2">No hay registros.</td>
                                </tr>
                            @endforelse
                        </tr>
                    </tbody>
                </table>
                <div class="links" style="padding: 20px">{{$Dashboards->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Added -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="title-modal"><kbd>Add Product</kbd></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('dashboard.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" name="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <textarea required name="description" class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Units</label>
                            <input required type="number" name="unit" class="form-control" id="unit" placeholder="Units">
                        </div>
                        <div class="form-group">
                            <label >Category</label>
                            <select required name="category" id="category" class="form-control">
                                <option selected>entertainment</option>
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
                            placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label >Status</label>
                            <select required name="status" id="status" class="form-control">
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

