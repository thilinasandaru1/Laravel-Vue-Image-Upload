<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>
    <body>
        <div id="app">
            <div class="container col-lg-offset-4 col-lg-4 pt-5">
                <form
                    action="{{ route('upload') }}"
                    enctype="multipart/form-data"
                    method="POST"
                >
                    @csrf
                    <input type="file" name="image" />
                    <input
                        type="submit"
                        class="btn btn-success"
                        value="upload"
                    />
                </form>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
