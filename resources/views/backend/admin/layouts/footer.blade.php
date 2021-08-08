
@section('footer')


    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="{{route('admin-logout')}}" class="btn btn-danger btn-small ">Logout</a>

                    {{--                                <a href="login.html" class="btn btn-primary">Logout</a>--}}
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>--}}
    <script src="{{url('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('backend/js/ruang-admin.min.js')}}"></script>
<script src="{{url('backend/vendor/chart.js/Chart.min.js')}}"></script>

<script src="{{url('backend/js/demo/chart-area-demo.js')}}"></script>

    <script src="{{url('backend/tag-input/bootstrap-tagsinput.js')}}"></script>

    <script src="{{url('backend/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('backend/ckeditor/config.js')}}"></script>
    <script src="{{url('backend/ckeditor/style.js')}}"></script>
    <script src="{{url('backend/ckeditor/build-config.js')}}"></script>


    <script src="{{url('backend/tag-input/bootstrap-tagsinput-angular.js')}}"></script>
    <script src="{{url('backend/js/custom.js')}}"></script>

    </body>

</html>
@endsection
