

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 256,'maxlength' => 256]) !!}
</div>

<!-- Announce Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('announce', 'Announce:') !!}
    {!! Form::textarea('announce', null, ['class' => 'form-control', "id"=>"announce", 'rows'=>'10']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', "id"=>"content", 'rows'=>'10']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id',\App\Models\Status::all()->pluck("name", "id") ,null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id',\App\Models\User::all()->pluck("name", "id"), null, ['class' => 'form-control']) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]',\App\Models\Tag::all()->pluck("name", "id"), null, ['class' => 'form-control', 'multiple'=>'multiple']) !!}
</div>

<!-- File Upload Field -->
@if(isset($article) && $article->image)
<div class="form-group col-sm-6">
    {!! Form::image($article->image, $article->title, ["width"=>150]) !!}
</div>
@endif
<div class="form-group col-sm-6">
        {!! Form::label('file', 'Image:') !!}
        {!! Form::file('file', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
</div>


@push("scripts")
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#announce' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush
