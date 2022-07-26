<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @error('name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', $education_material ?? null, ['class' => 'form-control', 'id' => 'content']) !!}

            @error('description')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('file', 'File :') !!}
            {!! Form::file('file', ['class' => 'form-control']) !!}

            @error('file')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="{{ route('teacher.education_material.index') }}" type="reset"
                   class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            let value = {!! json_encode($education_material->description ?? null) !!}
            CKEDITOR.replace('content');
            if (value) {
                CKEDITOR.instances['content'].setData(value);
            }
        });
    </script>
@endpush
