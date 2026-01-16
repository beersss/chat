{{-- $errors  表单验证的错误都存在这里 大于0就表示有错误 --}}
@if( count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <div>有异常错误:</div>
        <ul class="mt-2" style="list-style-type: none">
            @foreach($errors->all() as $error)
                <li>
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
