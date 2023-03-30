@foreach ($css as $file)
    <link href="{{ asset($file) }}" rel="stylesheet" type="text/css" />
@endforeach
