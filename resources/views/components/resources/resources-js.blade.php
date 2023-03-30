@foreach ($js as $file)
    <script src="{{ asset($file) }}"></script>
@endforeach
