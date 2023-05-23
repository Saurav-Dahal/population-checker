<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="wrapper">
        <div class="container">
            <div class="row" style="margin-top: 20px;">
                <div class="col-10">
                    <h4>Dashboard</h4>
                </div>
                <div class="col-2" style="margin-bottom: 20px;">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $data['LoggedUserInfo']['name'] }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <br>

        <!-- <div class="container">
            <div class="row">
                <div class="col-10">

                </div>
                <div class="col-2">
                    <a href="http://" style= "list-style: none; border: 1px solid blue; padding: 3px 5px;">Add Data</a>
                </div>
            </div>
        </div> -->

        <div class="container">
            <form method="POST" action="">
                @csrf
                <div class="row" style="margin-top: 20px;">
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example" name="country_id" id="country_id">
                            <option selected>All Countries</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example" name="city_id" id="city_id">
                            <option value = "0" selected>All Cities</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example" name="gender_id" id="gender_id">
                            <option selected>All Gender</option>
                            @foreach($genders as $gender)
                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="row" style="margin-top: 20px;">
                <div class="col">
                    <table class="table table-bordered table-stripped" id="population_table">
                        <thead>
                            <tr>
                                <th>Population Type</th>
                                <th>Number</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach($total_population as $tp)
                                <tr>
                                    <td>Total Old</td>
                                    <td>{{ $tp->old_people }}</td>
                                </tr>
                                <tr>
                                    <td>Total Young</td>
                                    <td>{{ $tp->young_people }}</td>
                                </tr>
                                <tr>
                                    <td>Total Child</td>
                                    <td>{{ $tp->child_people }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:20px;">
            <div class="text-left">
                <h4> <b>Summary Report</b> </h4>
                <div class="">
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>SNo.</th>
                                <th>Country</th>
                                <th>Population</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($top_population as $op)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $op->country_inf->name }}</td>
                                    <td>{{ $op->total }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-----------------JavaScript Function------>

    <script type="text/javascript">
        $('#country_id').on('change', function () {
            get_city_by_country();
        });

        function get_city_by_country() {
            var country_id = $('#country_id').val();
            $.post('{{ route('get.cities') }}', {
                    _token: '{{ csrf_token() }}',
                    country_id: country_id
                },
                function (data) {
                    $('#city_id').html(null);
                    $('#city_id').append($('<option value="">Choose A City</option>', {}));
                    for (var i = 0; i < data.length; i++) {
                        $('#city_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name
                        }));
                    }
                });
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#country_id').on('change', function () {
                var country_id = $(this).val();
                $.ajax({
                    url: "{{ url('/country/ajax') }}/"+country_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var country_people = data.country_people;
                        var html = '';
                        if (country_people.length > 0) {
                            for (let i = 0; i < country_people.length; i++) {
                                html += '<tr>\
                                <td>Old</td>\
                                <td>' + country_people[i]['old_people'] + '</td>\
                                </tr>\
                                <tr>\
                                <td>Young</td>\
                                <td>' + country_people[i]['young_people'] + '</td>\
                                </tr>\
                                <tr>\
                                <td>Child</td>\
                                <td>' + country_people[i]['child_people'] + '</td>\
                                </tr>';
                            }
                        } else {
                            html += '<tr>\
                                <td>Old</td>\
                                <td>No Population Found</td>\
                                </tr>\
                                <tr>\
                                <td>Young</td>\
                                <td>No Population Found</td>\
                                </tr>\
                                <tr>\
                                <td>Child</td>\
                                <td>No Population Found</td>\
                                </tr>';
                            }
                        $("#tbody").html(html);
                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#city_id').on('change', function () {
                var city_id = $(this).val();
                $.ajax({
                    url: "{{ url('/city/ajax') }}/"+city_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var people = data.people;
                        var html = '';
                        if (people.length > 0) {
                            for (let i = 0; i < people.length; i++) {
                                html += '<tr>\
                                <td>Old</td>\
                                <td>' + people[i]['old_people'] + '</td>\
                                </tr>\
                                <tr>\
                                <td>Young</td>\
                                <td>' + people[i]['young_people'] + '</td>\
                                </tr>\
                                <tr>\
                                <td>Child</td>\
                                <td>' + people[i]['child_people'] + '</td>\
                                </tr>';
                            }
                        } else {
                            html += '<tr>\
                            <td>Old</td>\
                            <td>No Population Found</td>\
                            </tr>\
                            <tr>\
                            <td>Young</td>\
                            <td>No Population Found</td>\
                            </tr>\
                            <tr>\
                            <td>Child</td>\
                            <td>No Population Found</td>\
                            </tr>';
                            }
                        $("#tbody").html(html);
                    }
                });
            });
        });
    </script>


    <script>
            $(document).ready(function () {
                $('#gender_id').on('change', function () {
                    var city_id = $('#city_id').val();
                    var gender_id = $(this).val();
                    $.ajax({
                        url: "{{ url('/gender/ajax') }}/"+city_id+"/"+gender_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var g_people = data.g_people;
                            var html = '';
                            if (g_people.length != '') {
                                for (let i = 0; i < g_people.length; i++) {
                                    html += '<tr>\
                                    <td>Old</td>\
                                    <td>' + g_people[i]['old'] + '</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Young</td>\
                                    <td>' + g_people[i]['young'] + '</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Child</td>\
                                    <td>' + g_people[i]['child'] + '</td>\
                                    </tr>';
                                }
                            } else {
                                html += '<tr>\
                                    <td>Old</td>\
                                    <td>No Population Found</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Young</td>\
                                    <td>No Population Found</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Child</td>\
                                    <td>No Population Found</td>\
                                    </tr>';
                                }
                            $("#tbody").html(html);
                        }
                    });
                });
            });

    </script>

    <script>
        $(document).ready(function () {
            $('#gender_id').on('change', function () {
                var country_id = $('#country_id').val();
                var gender_id = $(this).val();
                var city_id = $('#city_id').val();
                if(city_id == 0){
                    $.ajax({
                        url: "{{ url('/gender/ajax/country') }}/"+country_id+"/"+gender_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var g_people_by_country = data.g_people_by_country;
                            var html = '';
                            if (g_people_by_country.length != '' ) {
                                for (let i = 0; i < g_people_by_country.length; i++) {
                                    html += '<tr>\
                                    <td>Old</td>\
                                    <td>' + g_people_by_country[i]['old'] + '</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Young</td>\
                                    <td>' + g_people_by_country[i]['young'] + '</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Child</td>\
                                    <td>' + g_people_by_country[i]['child'] + '</td>\
                                    </tr>';
                                }
                            } else {
                                html += '<tr>\
                                    <td>Old</td>\
                                    <td>No Population Found</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Young</td>\
                                    <td>No Population Found</td>\
                                    </tr>\
                                    <tr>\
                                    <td>Child</td>\
                                    <td>No Population Found</td>\
                                    </tr>';
                                }
                            $("#tbody").html(html);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>