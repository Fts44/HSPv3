<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="height: 100%; width: 100%; overflow: hidden;">
    <embed style="position:absolute; left: 0; top: 0;" width="100%" height="100%" 
    src="{{ asset('storage/documents/'.$doc_details->dt_id.'/'.$doc_details->file_name) }}" 
    type="application/pdf">
</body>
</body>
</html>