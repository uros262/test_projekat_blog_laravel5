@extends('auth.admin')
@section('tabele')

    <div id="wrapper">





            <!-- Button trigger modal -->

            <a href="/komentar/{{$clanak->id}}">
                <button class="btn btn-primary">
                    Add Comment
                </button>
            </a>


            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Comment list of Article: <b>{{$clanak->title}}</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Body</th>
                                        <th>Plus</th>
                                        <th>Minus</th>
                                        <th style="color: red;">Flag</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="user_table">
                                    @include('auth._comment_table')
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