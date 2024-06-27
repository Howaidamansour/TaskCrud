<style>
    .upload__box {
        padding-top: 10px;
    }

    .upload__inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        display: inline-block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
    }

    .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all 0.3s ease;
    }

    .upload__btn-box {
        margin-bottom: 0px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 0px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }
</style>

<div class="card-body">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.name')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->name ?? old('name') }}" name="name" class="form-control" placeholder="@lang('items.name')" autofocus>
                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.select-category')</label>
                <div class="input-icon">
                    <select name="category_id" class="form-control select2">
                        <option value="">---</option>
                        @foreach ($categories as $id => $name)
                        <option value="{{ $id }}" {{ isset($row) && $row->category_id == $id    ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'category_id'])
            </div>





            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.sale_price')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->sale_price ?? old('sale_price') }}" name="sale_price" class="form-control" placeholder="@lang('items.sale_price')" autofocus>
                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'sale_price'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('items.pay_price')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->pay_price ?? old('pay_price') }}" name="pay_price" class="form-control" placeholder="@lang('items.pay_price')" autofocus>
                    <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'pay_price'])
            </div>

        </div>


        <div class="col-md-8">

            
                <div class="form-group mb-3">
                    <label for="file"></label>
                    <div class="upload__box">
                        <div class="upload__btn-box">
                            <label class="upload__btn">
                                {{trans('menu.product_images')}}
                                <input type="file" multiple="" id="files" name="images[]" data-max_length="20" class="upload__inputfile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                            </label>
                        </div>
                        <div class="upload__img-wrap"></div>
                    </div>
                </div>
           


        </div>
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save"></i> </button>
</div>



@push('js')
<script>
    $(document).ready(function() {
        ImgUpload();

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;


                    filesArr.forEach(function(f, index) {

                        // if (!f.type.match('image.*')) {
                        // return;
                        // }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    console.log(f.type);
                                    if (f.type == 'application/pdf') {
                                        var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg' ><div class='upload__img-close'></div><img  src='https://cdn-icons-png.flaticon.com/128/337/337946.png'></div></div>";

                                    } else {
                                        var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";

                                    }
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
                $(this).parent().children().remove();

            });
        }
    });


    $(function() {
        $('body').on('change', '.stores-select', function() {
            let qty = $(this).find('option:selected').data('qty');
            $(this).closest('.row').find('input.store-qty').val(qty);
        });

        $('.stores-select').change();
    });
</script>
@endpush