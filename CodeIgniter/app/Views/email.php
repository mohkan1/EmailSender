<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>Document</title>
</head>

<body>
    <br>
    <br>
    <div class="container center_div text-center border border-dark">
        <br>
        <br>

        <h1 class="display-1">Email Sender</h1>
        <form>
            <div class="form-group">
                <label for="email">From Email address</label>
                <input type="email" class="form-control" id="From_Email" name="From_Email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="email">To Email address</label>
                <input type="email" class="form-control" id="To_Email" name="To_Email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="text">subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
            </div>

            <br>
            <button type="button" id="sendEmail" class="btn btn-dark">Send</button>
            <br>
            <br>
        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("#sendEmail").on("click", function() {
            axios.post('http://localhost/EmailSender/CodeIgniter/public/EmailSender', {
                    From_Email: $("#From_Email").val(),
                    To_Email: $("#To_Email").val(),
                    subject: $("#subject").val(),
                    message: $("#message").val()
                })
                .then((response) => {
                    console.log(response);
                }, (error) => {
                    console.log(error);
                });
        });
    });
</script>

</html>