@extends('layouts.layout')

@section('navbar')

  <header class="fixed">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">Adjusting layout for: {{ $data["current"]->name }}</a></h1>
        </li>
      </ul>

      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
        <li class="has-form">
          <a href="#" class="button radius success" id="save-layout">Save Layout</a>
        </li>
         <li>
            <div style="height:100%">
              <a href="#" data-reveal-id="helpModal" style="height:100%">Help <i class="fa fa-question fa-lg"></i></a>
            </div>
          </li>
        </ul>

      </section>
    </nav>
  </header>

@stop

@section('content')
    <div id="wall" class="packery">
      
        <div class="tile menu stamp left no-drag">
          <div class="tile-body row">
            <div class="tile-content">
              <a href="#" class="nolink"><i class="fa fa-home fa-4x"></i></a>
            </div>
          </div>    
        </div>
          
        <div class="tile menu stamp left no-drag">  
          <div class="tile-body row">
            <div class="tile-content">
              <a href="#" class="nolink"><i class="fa fa-step-backward fa-4x"></i></a>
            </div>
          </div>  
        </div>  


      <div>
      @foreach ($data['endpoints'] as $endpoint)

        @if ($endpoint->always_show) 
        <div class="tile {{$endpoint->type}} {{$endpoint->color}} stamp left no-drag">
        @else
        <div class="tile {{$endpoint->type}} {{$endpoint->color}} pack draggable" data-guid="{{$endpoint->guid}}">
        @endif
          <div class="tile-body row">
              <div class="tile-front">
                  <div class="tile-content">
                      <a href="#" class="nolink">{{$endpoint->name}}</a>
                  </div>
              </div>
              <div class="tile-back">
                  <div class="tile-content">
                      <p>{{$endpoint->desc}}</p>
                  </div>
              </div>
          </div>
          <div class="tile-icons">
              <ul>
                  <li><a href="#" class="nolink"><i class="fa {{$endpoint->icon}} fa-lg"></i></a></li>
                   @if ($endpoint->type=='service-group') 
                  <li><a href="#" class="nolink"><i class="fa {{$endpoint->target_type}} fa-lg"></i></a></li>
                  @else
                  <li ><a href="#" class="nolink"><i class="fa {{$endpoint->target_type}} fa-lg"></i></a></li>
                  @endif
                  <!-- <li><a href="#" class="bookmark" aria-haspopup="true" class="has-tip" tooltip="Add to My favourites"><i class="fa fa-star fa-lg"></i></a></li>-->
                  <li><a href="#" class="nolink"><i class="fa fa-info fa-lg"></i></a></li>
              </ul>
          </div>
        </div>
      @endforeach
      </div>
    </div>
    <input type="hidden" id="currentGUID" value={{$data["current"]->guid}}
@stop

<!-- Modals -->
<div id="helpModal" class="reveal-modal" data-reveal aria-labelledby="Help" aria-hidden="true" role="dialog">
  <h1> Help! </h1>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="layoutDone" class="reveal-modal" data-reveal aria-labelledby="Layout Success" aria-hidden="true" role="dialog">
  <h2>Success!</h2>
  <p>Your layout has been saved</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="layoutFail" class="reveal-modal" data-reveal aria-labelledby="Layout Fail" aria-hidden="true" role="dialog">
  <h2>Oh no!</h2>
  <p>Something has gone wrong.  Please try aagain. If the problem persists please contact the IT department</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

