<form action="/tester" enctype="multipart/form-data" method="post">
    {{csrf_field()}}
    <input type="file" name="myfile">
    <input type="submit">
</form>