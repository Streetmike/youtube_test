<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        @if(Session::get('msg'))
            <div class="alert alert-success" role="alert"><strong>{{Session::get('msg')}}</strong></div>
        @endif
        @if(isset($errors) && $errors->count())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $msg)
                    <p>{{trans($msg)}}</p>
                @endforeach
            </div>
        @endif
        <div class="title">Youtube Rank Checker</div>
        <div class="col-md-12 col-lg-12">
            <form action="{{ route('handle') }}" class="form-horizontal" style="display: inherit;" role="form" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="url" class="form-control object" placeholder="Insert URL here...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="keywords" class="form-control numeric" autocomplete="off" placeholder="keywords, go, here...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <select name="country">
                            @foreach($countries as $item)
                                <option value="{{ $item->alpha2Code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group" id="submit-btm">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Find Rank</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
