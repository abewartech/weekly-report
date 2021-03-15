@if ($crud->hasAccess('update'))
	@if (!$crud->model->translationEnabled())

	<!-- Single edit button -->
	@if($entry->user_id)
	@if($entry->user_id == backpack_user()->id)
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-sm btn-link"><i class="la la-edit"></i> {{ trans('backpack::crud.edit') }}</a>
	@endif
	@else
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-sm btn-link"><i class="la la-edit"></i> {{ trans('backpack::crud.edit') }}</a>
	@endif
	@else

	<!-- Edit button group -->
	<div class="btn-group">
	  <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-sm btn-link pr-0"><i class="la la-edit"></i> {{ trans('backpack::crud.edit') }}</a>
	  <a class="btn btn-sm btn-link dropdown-toggle text-primary pl-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <span class="caret"></span>
	  </a>
	  <ul class="dropdown-menu dropdown-menu-right">
  	    <li class="dropdown-header">{{ trans('backpack::crud.edit_translations') }}:</li>
	  	@foreach ($crud->model->getAvailableLocales() as $key => $locale)
		  	<a class="dropdown-item" href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a>
	  	@endforeach
	  </ul>
	</div>

	@endif
@endif