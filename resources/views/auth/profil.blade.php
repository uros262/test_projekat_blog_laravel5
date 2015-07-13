@extends('auth.admin')
@section('tabele')

<div id="wrapper">




        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin panel</h1>

            </div>
            <div class="col-lg-12">
                <div id="notification" style="display: none;" class="alert alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span id="message"></span>
                </div>
            </div>

            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- Button trigger modal -->
                <button class="btn btn-primary" onclick="clearUserForm(); return false;" data-toggle="modal" data-target="#myModal">
                    Add User
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Add User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        User Info
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form role="form">
                                                    <div class="form-group">
                                                        <label>E-mail:</label>
                                                        <input id="email" class="form-control" placeholder="Enter e-mail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input id="password" class="form-control" type="password" placeholder="Enter password">
                                                    </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-6">
                                                <form role="form">
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input id="name" class="form-control" placeholder="Enter name">
                                                    </div>

                                                </form>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="clearUserForm(); return false;" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="saveUser('{{ csrf_token() }}'); return false;" class="btn btn-primary" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <hr>
        </div>








        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User list
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="user_table">
                                @include('auth._user_table')
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->





        <!-- Button trigger modal -->

        <a href="clanak/create">
            <button class="btn btn-primary">
                Add Article
            </button>
        </a>


        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Article list
                        <p style="color: blue;">Za pregled komentara kliknite na naslov clanka</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Published at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="user_table">
                                @include('auth._article_table')
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->



</div>
<!-- /#wrapper -->
@stop