@extends('layouts.app')
@section('content')

<div class="jumbotron p-0 m-0 bg-light rounded-3">
    <div class="container py-1">
      
        <h1 class="display-5 fw-bold">
            {{-- FUNGE
            PAGINA DEL TEST --}}
            {{-- controllo se i dati arrivanos --}}
            <?php
                // dd($activity)
            ?>
        </h1>
        <section class="container">
            {{-- Logica messaggio di successo di aggiunta/modifica/elimina --}}
            <div class="text-center">
                @if (session('message'))
                    <p id="notification" class="text-success">{{ session('message') }}!</p>
                @else
                    <p id="notification" >Nessuna notifica!</p>
                @endif
            </div>
    
            {{-- sintassi php liscio per eventuali prove--}}
            <?php
            // dd()
            ?>
    
            {{--********************************** modale per aggiungere ************************--}}

            <div class="float-md-end mx-2 text-center">
                {{-- button per aprire chiudere modale di aggiunta --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAct">
                    Add
                </button>

                @if($filter == false)
                <a href="{{ route('activity.index', ['filter' => request('filter') == true ? false : true]) }}">
                    <button type="button" class="btn btn-warning">
                        Hidden Closed
                    </button>
                </a>
                @else
                <a href="{{ route('activity.index', ['filter' => request('filter') == true ? false : true]) }}">
                    <button type="button" class="btn btn-success">
                        Show Closed
                    </button>
                </a>
                @endif
            </div>
            
            {{-- mantengo i parametri anche muovendomi tra le pagine --}}

            <div class="w-50 h-25 mt-1 mx-auto">
                {{ $activity->appends(['filter' => $filter,'sort' => $sort, 'direction' => $direction])->links('pagination::bootstrap-5') }}
            </div>
           
    
            {{-- ******************************************corpo della modale*********************************** --}}
            <div class="modal fade" id="addAct" tabindex="-1" aria-labelledby="addAct" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Activity</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- Titolo --}}

                                <div class="my-width m-5">
                                    <label for="act_title" class="form-label">Title:</label>
    
                                    <input type="text" class="form-control" id="act_title" placeholder="Title"
                                        name="title" required>
                                </div>
                                @error('title')
                                    <span class="bg-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                {{-- Partecipanti --}}
                                
                                <div class="my-width m-5">
                                    <label for="act_attendes" class="form-label">Attendes:</label>
    
                                    <input type="attendes" class="form-control" id="act_attendes" placeholder="attendes"
                                        name="attendes" min="1" required>
                                </div>
                                @error('attendes')
                                    <span class="bg-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                {{-- Descrizione --}}

                                <div class="my-width m-5">
                                    <label for="act_description" class="form-label">Description:</label>
    
                                    <textarea type="text-area" class="form-control" id="act_description" cols="50" rows="4" maxlength="500"
                                        placeholder="Description" name="description" required></textarea>
                                </div>
                                @error('description')
                                    <span class="bg-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                {{-- Data --}}

                                <div class="my-width m-5">
                                    <label for="act_start" class="form-label">start:</label>
    
                                    <input type="date" class="form-control" id="act_start" cols="50" rows="4" maxlength="500" name="start" required>

                                </div>
                                @error('start')
                                    <span class="bg-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <button id="my-btn" type="submit" class="btn btn-primary fs-5 mx-5 mb-5">
                                    Add Activity
                                </button>
    
                            </form>
                        </div>
    
                        <div class="modal-footer">
    
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
                        </div>
                    </div>
                </div>
            </div>
    
           
            {{-- *********************************Inizio tabella*********************************** --}}

            <?php
            //  dd($activity, $filter)
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-2">
                            <a href="{{ route('activity.index', ['sort' => 'title', 'direction' => request('direction') == 'desc' ? 'asc' : 'desc']) }}"
                                class="{{ request('sort') == 'title' && request('direction') == $direction ? 'order' : '' }}">
                                Title
                                @if ($sort == 'title')
                                    @if ($direction === 'asc')
                                        ↑
                                    @else
                                        ↓
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="col-1">
                            <a href="{{ route('activity.index', ['sort' => 'attendes', 'direction' => request('direction') == 'desc' ? 'asc' : 'desc']) }}"
                                class="{{ request('sort') == 'attendes' && request('direction') == $direction ? 'order' : '' }}">
                                Attendes
                                @if ($sort == 'attendes')
                                    @if ($direction === 'asc')
                                        ↑
                                    @else
                                        ↓
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="col-3 description">
                            <a href="{{ route('activity.index', ['sort' => 'description', 'direction' => request('direction') == 'desc' ? 'asc' : 'desc']) }}"
                                class="{{ request('sort') == 'description' && request('direction') == $direction ? 'order' : '' }}">
                                 Description
                                @if ($sort == 'description')
                                    @if ($direction === 'asc')
                                        ↑
                                    @else
                                        ↓
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="col-1">
                            <a href="{{ route('activity.index', ['sort' => 'closed', 'direction' => request('direction') == 'desc' ? 'asc' : 'desc']) }}"
                                class="{{ request('sort') == 'closed' && request('direction') == $direction ? 'order' : '' }}">
                                Closed
                                @if ($sort == 'closed')
                                    @if ($direction === 'asc')
                                        ↑
                                    @else
                                        ↓
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="col-1">
                            <a href="{{ route('activity.index', ['sort' => 'start', 'direction' => request('direction') == 'desc' ? 'asc' : 'desc']) }}"
                                class="{{ request('sort') == 'start' && request('direction') == $direction ? 'order' : '' }}">
                                Start
                                @if ($sort == 'start')
                                    @if ($direction === 'asc')
                                        ↑
                                    @else
                                        ↓
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="col-2">
                            <a href="">
                                Action

                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($activity as $element)
                        <tr>
                            <td class="{{ request('sort') == 'title' && request('direction') == $direction ? 'table-warning' : '' }}">{{ $element->title }}</td>

                            <td class="{{ request('sort') == 'attendes' && request('direction') == $direction ? 'table-warning' : '' }}">{{ $element->attendes }}</td>

                            <td class="{{ request('sort') == 'description' && request('direction') == $direction ? 'table-warning' : '' }} description">{{ $element->description }}</td> 

                            <td class="{{ request('sort') == 'closed' && request('direction') == $direction ? 'table-warning' : '' }}">
                                @if ($element->closed == true)
                                    <i class="fa-solid fa-calendar-check text-primary"></i>
                                    {{-- chiusa --}}
                                @else
                                    <i class="fa-regular fa-calendar text-success"></i>
                                    {{-- aperta --}}
                                @endif
                            </td>

                            <td class="{{ request('sort') == 'start' && request('direction') == $direction ? 'table-warning' : '' }}">{{ $element->start }}</td>

                            <td>
                                {{-- button per modale di modifca --}}
                                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $element->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                {{-- button per il delete --}}
                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#modal-{{$element->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
    
                            {{--******************************************************** modale di modifica******************************************************************* --}}
    
                            <div class="modal fade" id="exampleModal-{{ $element->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Activity</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                             <form action="{{ route('activity.update', ['activity' => $element->id]) }}" method="POST" enctype="multipart/form-data">
                                                 @csrf 
                                                 @method('PUT')

                                                {{-- Titolo attività --}}

                                                <div class="my-width m-5">
                                                    <label for="act_title" class="form-label">Title:</label>
                    
                                                    <input type="text" class="form-control" id="act_title" placeholder="Title"
                                                        name="title" value="{{$element->title}}"  required>
                                                </div>
                                                @error('title')
                                                    <span class="bg-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                {{-- Partecipanti attività --}}

                                                <div class="my-width m-5">
                                                    <label for="act_attendes" class="form-label">Attendes:</label>
                    
                                                    <input type="attendes" class="form-control" id="act_attendes" placeholder="attendes"
                                                        name="attendes" min="1"
                                                        value="{{$element->attendes}}" required>
                                                </div>
                                                @error('attendes')
                                                    <span class="bg-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                {{-- Descrizione attività --}}

                                                <div class="my-width m-5">
                                                    <label for="act_description" class="form-label">Description:</label>
                    
                                                    <input type="text" class="form-control" id="act_description" cols="50" rows="4" maxlength="500"
                                                        placeholder="Description" name="description"
                                                        value="{{$element->description}}" required>
                                                </div>
                                                @error('description')
                                                    <span class="bg-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                {{-- Attività chiusa o aperta --}}

                                                <div class="my-width m-5">
                                                    <label for="act_closed" class="form-label">Is closed?</label>
                                                    
                                                    @if ($element->closed == false)
                                                        <input type="checkbox" id="act_cloed"
                                                    placeholder="Closed" name="closed">
                                                    @else
                                                        <input type="checkbox" id="act_cloed"
                                                        placeholder="Closed" name="closed" checked>
                                                    @endif
                                                    
                                                </div>
                                                @error('closed')
                                                    <span class="bg-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                
                                                {{-- Data inizio attività --}}
                                                <div class="my-width m-5">
                                                    <label for="act_start" class="form-label">start:</label>
                    
                                                    <input type="date" class="form-control" id="act_start" cols="50" rows="4" maxlength="500"
                                                        name="start"
                                                         value="{{$element->start}}" required>
                                                </div>
                                                @error('start')
                                                    <span class="bg-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    
                                                
                                                <button id="my-btn" type="submit" class="btn btn-primary fs-5 mx-5 mb-5">
                                                    Edit
                                                </button>
                    
                                            </form> 
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            {{-- modale di delete --}}
                           
                            <div class="modal fade" id="modal-{{$element->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$element->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-white" id="modalTitle-{{$element->id}}">
                                                Delete Activity "{{$element->title}}"
                                            </h3>
                                            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                              
                                        <div class="modal-body text-center m-3">
                                            <span class="text-white fs-5">
                                              Are you sure you want to delete
                                              <br>
                                              <strong>
                                                 {{$element->title}}?
                                              </strong>
                                            </span>
                                            <br>
                                            <span class="text-danger fs-5">
                                                You cannot undo this operation
                                            </span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                              
                                            <form action="{{ route('activity.destroy', $element->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                              
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                              
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            {{-- <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer> --}}

        </section>
        
    </div>
</div>
<style>
    #notification {
        font-weight: 500;
        font-size: 25px
    }
    a{
        text-decoration: none;
        color: rgb(32, 31, 31);
        font-weight: 300;
    }
 /* responsive per dispositivi mobili */
    @media only screen and (max-width: 450px) {
    .description {
    display: none;
    }
}
</style>
@endsection