<div class="container">
    <div class="row">
        <div class="span3">
            <nav class="main">
                <?php echo form_open('users/logout'); ?>
                <h2>Zalogowany</h2>
                <p>Zalogowany jako:</p>
                <p><?php echo $this->session->userdata('username'); ?></p></br> 

                <p><button class="btn btn-primary" data-toggle="button" id="loginItems">Wyloguj</button> </p>
                <?php echo form_close(); ?>
                <p><a href="<?php echo render_url('changepass', ''); ?>">Zmień hasło</a></p>
                <p><a href="<?php echo render_url('changemail', ''); ?>">Zmień adres</a></p>
                <?php echo $this->session->flashdata('info'); ?>
            </nav>
            <aside class="aside-bg">
                <h3 class="nagl">Pogoda</h3>
                <ul class="unstyled">

                    <div id="today"><h5>dzisiaj</h5></div>
                    <div id="forecast"><h5>jutro</h5></div>
                    <script>



                        $(document).ready(function() {
                            var $lon = 0;
                            var $lat = 0;
                            var $url = '';
                            if (geo_position_js.init()) {
                                geo_position_js.getCurrentPosition(success_callback, error_callback, {enableHighAccuracy: true});
                            }
                            else {
                                alert("Functionality not available");
                            }
                            function success_callback(p)
                            {
                                $lat = p.coords.latitude.toFixed(2);
                                $lon = p.coords.longitude.toFixed(2);

                                $.ajax({
                                    type: 'GET',
                                    url: "http://api.openweathermap.org/data/2.5/weather?lat=" + $lat + "&lon=" + $lon + '&units=metric',
                                    dataType: 'jsonp',
                                    success: function(result) {
                                        $('#today').append('<img id="theImg" src="http://openweathermap.org/img/w/' + result.weather[0].icon + '.png" />')
                                        $('#today').append('<h3>' + Math.floor(result.main.temp) + '<h3/>');
                                        document.getElementById("placeholder").innerHTML = data.firstName;
                                    },
                                    error: function(xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                    }
                                    //async: true
                                });

                                $.ajax({
                                    type: 'GET',
                                    url: "http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + $lat + "&lon=" + $lon + '&cnt=1&mode=json&units=metric',
                                    dataType: 'jsonp',
                                    success: function(result) {
                                        $('#forecast').append('<img id="theImg" src="http://openweathermap.org/img/w/' + result.list[0].weather[0].icon + '.png" />')
                                        $('#forecast').append('<h3>' + Math.floor(result.list[0].temp.day) + '<h3/>');
                                    },
                                    error: function(xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                    }
                                    //async: true
                                });
                            }
                            function error_callback(p)
                            {
                                //alert('error='+p.message);
                            }
                        });


                    </script>
                </ul>
            </aside>
        </div>