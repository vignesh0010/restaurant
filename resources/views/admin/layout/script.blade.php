<!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        // Javascript Ajax

        function scriptAjax(formElement,method,url_string) {

                const request = new XMLHttpRequest();

                request.onreadystatechange = function(){
                    if(this.readyState == 4 ){
                        if(this.status == 200) {
                            console.log('ajax success');
                            return response = {
                                'status_code' : 200,
                                'response' : this.response,
                            }
                            
                        }else{
                            console.log('ajax Failed');
                            return response = {
                                'status_code' : 200,
                                'response' : this.response,
                            }
                        }
                    }
                }
                request.open(method,url_string,true);
                request.send(new FormData(formElement));
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.5') }}"></script>