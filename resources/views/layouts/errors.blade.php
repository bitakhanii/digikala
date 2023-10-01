<style>
    .validation_error {
        color: #a94442;
        background-color: #f2dede;
        border: 1px solid #ebccd1;
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 4px;
        line-height: 28px;
        font-size: 10.5pt;
    }
</style>

@if ($errors->any())
    <div class="validation_error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
