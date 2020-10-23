<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Zoo!</title>
</head>
<body>
<section>
    <div class="container">
        <div class="col-12">
            <h2>Animals</h2>
            <div class="text-right">Current time</div>
        </div>
        <div class="btn-group mb-3">

               <a class="btn btn-primary btn-lg  mr-3" href="/reduce" role="button">+1 Hour</a>

              <a class="btn btn-primary btn-lg  mr-3" href="feed" role="button">Feed</a>


        </div>

        <div class="clearfix">&nbsp;</div>
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Current Health</th>
                    <th scope="col">Current Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($animals as $animal)
                    <tr>

                        <td>{{ $animal->breed->name }}</td>
                        <td>{{ $animal->current_health }}</td>
                        <td>{{ $animal->health_status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>