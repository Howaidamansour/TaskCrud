<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">@lang('categories.name')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="@lang('categories.name')" autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('categories.select-main-category')</label>
        <div class="input-icon">
            <select name="category_id" class="form-control select2" data-placehoder="@lang('categories.select-main-category')" placehoder="@lang('categories.select-main-category')">
                <option value="">@lang('categories.select-main-category')</option>
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" {{ isset($row) && $row->category_id == $id    ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'category_id'])
    </div>

</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save"></i> </button>
</div>
