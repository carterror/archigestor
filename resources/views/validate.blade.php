@if(Session::has('message'))
  <div class="alert alert-{{ Session::get('type')}} alert-dismissible" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5>
        <i class="icon fas @if(Session::get('type') == "danger") fa-ban @elseif(Session::get('type') == "info") fa-info @elseif(Session::get('type') == "warning") fa-exclamation-triangle @else fa-check @endif  "></i>
        {{ Session::get('message') }}
    </h5>
  </div>
@endif 