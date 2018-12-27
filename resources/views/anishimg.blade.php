<html>
    <body>
        <form action="{{ url ('/staff/submit' ) }}" enctype="multipart/form-data" method="POST">
            <p>
                <label for="photo">
                    <input type="file" name="photo" id="photo">
                </label>
            </p>
            <button>Upload</button>
            {{ csrf_field() }}
        </form>
    </body>
</html>