@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
  <h1>Personal Docente</h1>
  <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')

  @include('admin.eventos.modal-calendar')
  @include('admin.eventos.modal-fastEvents')
  <div class='container-fluid'>
    <div class='row'>
      <div class='col-sm-3'>
        <div id='external-events' >
          <h4>Plan Academico</h4>

          <div id='external-events-list'>

            @isset($fastEvents)
                @forelse($fastEvents as $fastEvent)
                    <div id="boxFastEvent{{ $fastEvent->id }}"
                        style="padding: 4px; border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                        class='fc-event event text-center'
                        data-event='{
                          "id":"{{ $fastEvent->id }}",
                          "title":"{{ $fastEvent->title }}",
                          "color":"{{ $fastEvent->color }}",
                          "start":"{{ $fastEvent->start }}",
                          "end":"{{ $fastEvent->end }}",
                          "descripcion":"{{ $fastEvent->descripcion }}"
                        }'>
                        {{ $fastEvent->title }}
                    </div>
                @empty
                    <p>No hay temas en el plan Academico</p>
                @endforelse
            @endisset

        </div>

          <p>
            <input type='checkbox' id='drop-remove'/>
            <label for='drop-remove'>Eliminar al Insertar</label>
            <button class="btn btn-sm btn-success" id="newFastEvent">Insertar Plan</button>
          </p>
        </div>

        
          
        
      </div>
      <div class='col-sm-9'>
        
        <div 
          id='calendar'
          data-route-load-events="{{ route('routeLoadEvents') }}"
          data-route-event-update="{{ route('routeEventUpdate') }}"  
          data-route-event-store="{{ route('routeEventStore') }}"
          data-route-event-delete="{{ route('routeEventDelete') }}"
          
          data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
          data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
          data-route-fast-event-store="{{ route('routeFastEventStore') }}"

          
        ></div>
      </div>  
    </div>
    
      

  </div>


@stop

@section('css')
  <link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
  <link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
  <link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
  <link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  
  <link href='{{asset('assets/fullcalendar/css/style.css')}}' rel='stylesheet' />

@stop

@section('js')
<script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>

<script src='{{asset('assets/fullcalendar/packages/core/locales-all.js')}}'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>

{{-- {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>  --}}
<script>let objCalendar;</script>
<script src='{{asset('assets/fullcalendar/js/script.js')}}'></script>
<script src='{{asset('assets/fullcalendar/js/calendar.js')}}'></script>
    
@stop