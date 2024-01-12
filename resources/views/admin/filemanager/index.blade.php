@extends('layouts.admin')

@section('content')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= url('/public/jquery-ui/') ?>/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?= url('elFinder/css') ?>/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="<?= url('elFinder/css') ?>/theme.css">

    <div class="container">
        <div class="row">
            <iframe src="{{ url('/elFinder/index.php?spss=102030102030') }}" width="100%" height="500px"></iframe>
            <div id="elfinder"></div>
        </div>
    </div>

    <script src="<?= url('/elFinder/js') ?>/elfinder.min.js"></script>
    <script src="<?= url('/public/jquery-ui') ?>/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#elfinder').elfinder({
                url : '<?= url('elFinder/php/elFinderConnector.class.php') ?>',
                height:500
            });
        });
    </script>



@endsection