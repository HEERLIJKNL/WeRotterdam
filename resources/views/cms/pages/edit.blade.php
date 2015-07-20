@extends('cms.main-layout')

@section('content')

<div class="product-details products">
    @if(isset($page->id))
        <form class="form-horizontal" method="post" action="/admin/pages/{{$page->id}}">
        <input type="hidden" name="_method" value="PUT" />
    @else
        <form class="form-horizontal" method="post" action="/admin/pages">
        <input type="hidden" name="_method" value="POST" />
    @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" class="form-control" id="Name" name="name" placeholder="Naam" value="{{$page->name}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" class="form-control" id="Url" name="url" placeholder="Url" value="{{$page->url}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <textarea name="content" class="form-control">{{$page->content}}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
</form>
</div>

<script type="text/javascript">
    tinymce.init({ 	selector: "textarea",
        content_css: [
            '/css/main.css',
            '//fonts.googleapis.com/css?family=Lato:100',
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'],
        theme: "modern",
        skin: 'light',
        relative_urls : false,
        document_base_url : "local.werotterdam.nl/",
        plugins: [
            "advlist autolink lists link image charmap preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "template paste textcolor colorpicker textpattern code"
        ],
        toolbar1: "insertfile undo redo | fontsizeselect | styleselect | bold italic | bullist numlist outdent indent | link image | code | print preview media | forecolor | backcolor emoticons",
        image_advtab: true,
        height:500,
        templates : [
            {
                title: "2 Cellen naast elkaar",
                url: "/2Cells.htm",
                description: "Voeg een sectie toe met 2 cellen naast elkaar."
            }
        ]
    });
</script>

@endsection